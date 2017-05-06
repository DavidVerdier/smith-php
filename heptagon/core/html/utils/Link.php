<?php 
class Link extends HtmlNode {

    public function __construct(string $rel, string $href, string $type) {
        parent::__construct('link');
        $this->attr('rel',$rel)
             ->attr('href',$href)
             ->attr('type',$type);
    }
}
?>