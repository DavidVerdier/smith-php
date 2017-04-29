<?php 
class Span extends Element {

    public function __construct(string $content) {
        parent::__construct();
        $this->tag = 'span';
        $this->selfClosing = false;
        $this->content = $content;
    }
}
?>