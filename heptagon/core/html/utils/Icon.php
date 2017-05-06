<?php 
class Icon extends HtmlNode {

    public function __construct(string $icon, string $size = 'lg') {
        parent::__construct('i');
        $this->addClass('fa fa-'.$size.' fa-'.$icon);
    }
}
?>