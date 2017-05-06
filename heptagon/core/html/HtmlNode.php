<?php
class HtmlNode {
    protected $tag;

    protected $attributes;

    protected $children;

    private $selfClosing = false;

    private static $selfClosingTags = 
        array('area','base','br','col','command','embed','hr','img','input','keygen','link','meta','param','source','track','wbr');

    public function __construct($tag = 'div', $attr = array()) {
        $this->tag = $tag;
        $this->children = array();
        $this->attributes = $attr;
        $this->selfClosing = in_array($tag, HtmlNode::$selfClosingTags);
    }

    public function addChild(HtmlNode $e, string $name = null) {
        if (!$name) {
            array_push($this->children, $e);
        } else {
            $this->children[$name] = $e;
        }
        return $this;
    }

    public function attr(string $key, string $value = null) {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function addClass(string $cssClass) {
        if (!isset($this->attributes['class'])) 
            $this->attributes['class'] = '';
        $this->attributes['class'] .= $cssClass . ' ';
        return $this;
    }

    public function render() {
        $output='<'.$this->tag.' ';
        foreach ($this->attributes as $key => $value) {
            $output.=$key.'="'.$value.'" ';
        }
        if ($this->selfClosing) {
            $output.='/>';
        } else {
            $output.='>';
            foreach ($this->children as $c) {
                $output.=$c->render();
            }
            $output.='</'.$this->tag.'>';
        }
        return $output;
    }
}
?>