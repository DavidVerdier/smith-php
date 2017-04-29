<?php 
class Paragraph extends Element {

    public function __construct(string $content) {
        parent::__construct();
        $this->tag = 'p';
        $this->selfClosing = false;
        $this->content = $content;
    }
}
?>