<?php
namespace EventPHP;

class Event {

    function on($event, $callback = false, $priority = 100) {
        while (isset($GLOBALS['e_event'][$event][$priority])) {
            $priority++;
        }
        $GLOBALS['e_event'][$event][$priority] = $callback;
    }

    function trigger($event, $param = false) {
        if (isset($GLOBALS['e_event'][$event])) {
            $event = $GLOBALS['e_event'][$event];
            
            ksort($event); //Ordena o array pelas chaves
            
            foreach ($event as $callback) {
                if ($callback) {
                    if (isset($param[0])) {
                        call_user_func_array($callback, $param);
                    } else {
                        $callback();
                    }
                }
            }
        }
    }

}