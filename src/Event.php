<?php
namespace EventPHP;

class Event {

    function on($event, $callback = false) {
        $GLOBALS['e_event'][$event][] = $callback;
    }

    function trigger($event, $param = false) {
        foreach ($GLOBALS['e_event'][$event] as $callback) {
            if ($callback) {
                if (isset($param[0])) {
                    call_user_func_array($callback, $param);
                }else{
                    $callback();
                }
            }
        }
    }

}
