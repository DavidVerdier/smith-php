<?php
namespace Heptagon\Core;

class Event {
    
    private $type;

    private $details = array();

    public function __construct(string $type, array $details) {
        $this->type = $type;
        $this->details = $details;
    }

    public function getType() {
        return $this->type;
    }

    public function get($detail) {
        return $this->details[$detail];
    }
}
?>