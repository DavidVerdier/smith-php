<?php 
class Div extends Element {
    public function __construct() {
        parent::__construct();
        $this->tag = 'div';
        $this->selfClosing = false;
    }
}
?>