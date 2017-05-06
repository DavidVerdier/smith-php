<?php

class Document
{
    private $scripts = array();

    private $html;

    private $head;

    private $body;

    public function __construct() {
        $this->html = new HtmlNode('html');
        $this->head = new HtmlNode('head');
        $this->body = new HtmlNode('body');

        $this->html->addChild($this->head);
        $this->html->addChild($this->body);
    }

    public function render() {
        $this->renderScripts();
        ?>
        <!DOCTYPE html>
        
        <?= $this->html->render() ?>
        <?php
    }

    public function addBaseTheme(string $theme) {
        $this->body->addClass($theme);
    }

    public function addHead(HtmlNode $raw = null) {
        if ($raw) 
            $this->head->addChild($raw);
    }

    public function addContent(HtmlNode $content = null) {
        if ($content) 
            $this->body->addChild($content);
    }

    public function addLink(HtmlNode $link) {
        $this->head->addChild($link);
    }

    public function addScript($path) {
        array_push($this->scripts, $path);
    }

    private function renderScripts() {
        $scripts = '';
        foreach ($this->scripts as $script) {
            $this->body->addChild(new Script($script.'.js'));
        }
    }
}
?>