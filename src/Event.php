<?php

namespace EventPHP;

class Event {

    protected $event = [];
    protected $file = [];
    protected $executed = [];

    function on($event, $callback = false, $priority = 100) {
        while (isset($this->event[$event][$priority])) {
            $priority++;
        }
        $this->event[$event][$priority] = $callback;

        $this->file[$event][$priority] = $this->getFile($callback);
    }

    function trigger($event, $param = false) {
        if (isset($this->event[$event])) {
            $listeners = $this->event[$event];

            ksort($listeners); //Ordena o array pelas chaves

            foreach ($listeners as $priority => $callback) {
                if ($callback) {
                    if (isset($param[0])) {
                        call_user_func_array($callback, $param);
                    } else {
                        $callback();
                    }
                    $this->executed[][$priority][$event] = $this->getFile($callback);
                }
            }
        }
    }

    function listeners($event = false) {
        if ($event) {
            if (isset($this->file[$event])) {
                ksort($this->file[$event]);

                return $this->file[$event];
            }
            return false;
        }

        foreach ($this->file as &$f) {
            ksort($f);
        }
        return $this->file;
    }
    
    function debug(){
        return $this->executed;
    }

    private function getFile($callback) {
        $ref = new \ReflectionFunction($callback);
        $file = $ref->getFileName();
        return $file;
    }

}
