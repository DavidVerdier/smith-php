<?php 
class Raw extends Element {

    public function __construct(string $content) {
        $this->content = $content;
    }

    public function render() {
        return $this->content;
    }
}
?>