<?php
namespace Heptagon\Core;

class Logger {

    private static $messages = array();

    public static function log(string $msg) {
        self::$messages[date('d/m/Y H:i:s')] = $msg;
    }

    public static function postAll() {
        $log = "------------------------------------------------------------------\n";

        foreach (self::$messages as $date => $msg) {
            $log .= '[' . $date . '] ' . $msg . "\n";
        }
        if (file_exists('log.txt')) {
            $log = file_get_contents('log.txt') . $log;
        }
        
        file_put_contents('log.txt', $log);
    }
}
?>