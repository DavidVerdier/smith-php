<?php 
class TextNode extends HTMLNode {

    protected $content;

    public function __construct(string $content) {
        $this->content = $content;
    }

    public function render() {
        return $this->content;
    }
}
?>