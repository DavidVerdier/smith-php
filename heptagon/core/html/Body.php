<?php 
class Body extends Element {
    public function __construct() {
        parent::__construct();
        $this->tag = 'body';
        $this->selfClosing = false;
    }
}
?>