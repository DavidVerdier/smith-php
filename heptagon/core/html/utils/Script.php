<?php 
class Script extends HtmlNode {

    public function __construct(string $src, string $type = 'text/javascript') {
        parent::__construct('script');
        $this->attr('src',$src)
             ->attr('type',$type);
    }
}
?>