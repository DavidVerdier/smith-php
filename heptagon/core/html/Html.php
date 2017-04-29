<?php 
class Html extends Element {
    public function __construct() {
        parent::__construct();
        $this->tag = 'html';
        $this->selfClosing = false;
    }
}
?>