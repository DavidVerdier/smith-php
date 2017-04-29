<?php 
class Img extends Element {
    public function __construct(string $path) {
        parent::__construct();
        $this->tag = 'img';
        $this->selfClosing = true;
        $this->addAttribute('src',$path);
    }
}
?>