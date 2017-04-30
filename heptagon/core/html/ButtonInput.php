<?php 
class ButtonInput extends Element {

    public function __construct(string $href, string $content) {
        parent::__construct();
        $this->tag = 'button';
        $this->selfClosing = false;
        $this->content = $content;
        $this->addAttr('href', $href);
    }
}
?>