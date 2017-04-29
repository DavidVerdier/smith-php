<?php 
class Script extends Element {
    public function __construct($type,$path) {
        parent::__construct();
        $this->tag = 'script';
        $this->selfClosing = false;
        $this->addAttr('type',$type);
        $this->addAttr('href',$path);
    }
}
?>