<?php
abstract class Element {
    protected $tag;

    protected $selfClosing = false;

    protected $attributes;

    protected $children;

    protected $content;

    public function __construct() {
        $this->children = array();
        $this->attributes = array();
    }

    public function addChild(Element $e, string $name = null) {
        if (!$name) {
            array_push($this->children, $e);
        } else {
            $this->children[$name] = $e;
        }
    }

    public function addAttr(string $key, string $value) {
        $this->attributes[$key] = $value;
    }

    public function addStyle(string $cssClass) {
        if (!isset($this->attributes['class'])) 
            $this->attributes['class'] = '';
        $this->attributes['class'] .= $cssClass . ' ';
    }

    public function render() {
        $output='<'.$this->tag.' ';
        foreach ($this->attributes as $key => $value) {
            $output.=$key.'="'.$value.'" ';
        }
        if ($this->selfClosing) {
            $output.='/>';
        } else {
            $output.='>'.$this->content;
            foreach ($this->children as $c) {
                $output.=$c->render();
            }
            $output.='</'.$this->tag.'>';
        }
        return $output;
    }
}
?>