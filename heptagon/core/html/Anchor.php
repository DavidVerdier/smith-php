<?php 
class Anchor extends Element {

    public function __construct(string $href, string $content) {
        parent::__construct();
        $this->tag = 'a';
        $this->selfClosing = false;
        $this->content = $content;
        $this->addAttr('href', $href);
    }
}
?>