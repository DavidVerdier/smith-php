<?php
namespace Heptagon\Core;

class EventDispatcher {

    public $listeners = array();

    public static function addListener(string $eventType, Controller $listener) {
        if (!array_key_exists(eventType, $this->listeners)) {
            $this->listeners[$eventType] = array();
        }
        $this->listeners[$eventType][] = $this;
    }

    public static function trigger(string $type, array $details) {
        $method = 'on'.$type;
        foreach ($this->listeners[$type] as $listener) {
            $listener->$method($details);
        }
    }
}
?>