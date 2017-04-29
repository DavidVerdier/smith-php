<?php 
class Link extends Element {
    public function __construct($rel,$type,$path) {
        parent::__construct();
        $this->tag = 'link';
        $this->selfClosing = true;
        $this->addAttr('rel',$rel);
        $this->addAttr('type',$type);
        $this->addAttr('href',$path);
    }
}
?>