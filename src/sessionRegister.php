<?php
/**
 * session_register for greater than php5.4
 */
if (PHP_VERSION_ID >= 50400) {
    if (! function_exists('session_register')) {
        function session_register($name) {
            if (! isset($GLOBALS[$name])) {
                return false;
            }
            if (session_id() === '') {
                session_start();
            }
            $_SESSION[$name] = $GLOBALS[$name];
            return true;
        }
    }
}