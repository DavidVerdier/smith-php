<?php

class Document
{
    private $scripts = array();

    private $html;

    private $head;

    private $body;

    public function __construct() {
        $this->html = new Html();
        $this->head = new Head();
        $this->body = new Body();

        $this->html->addChild($this->head);
        $this->html->addCHild($this->body);
    }

    public function render() {
        $this->renderScripts();
        ?>
        <!DOCTYPE html>
        
        <?= $this->html->render() ?>
        <?php
    }

    public function addBaseTheme(string $theme) {
        $this->body->addStyle($theme);
    }

    public function addHead(Element $raw = null) {
        if ($raw) 
            $this->head->addChild($raw);
    }

    public function addContent(Element $content = null) {
        if ($content) 
            $this->body->addChild($content);
    }

    public function addLink(Link $link) {
        $this->head->addChild($link);
    }

    public function addScript($path) {
        array_push($this->scripts, $path);
    }

    private function renderScripts() {
        $scripts = '';
        foreach ($this->scripts as $script) {
            $this->body->addChild(new Script('text/javascript', $script.'.js'));
        }
    }
}
?>