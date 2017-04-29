<?php 
class Head extends Element {
    public function __construct() {
        parent::__construct();
        $this->tag = 'head';
        $this->selfClosing = false;
    }
}
?>