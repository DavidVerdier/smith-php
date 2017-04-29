<?php
class App extends Component
{
    private $document;

    private $view;

    private $request;

    public function __construct() {
        $this->rewrite();
        if (COMPILE_LESS) {
            $lessc = new lessc();
            $lessc->compileFile(CORE_LESS."/core.less",CORE_CSS."/core.css");
        }
        $this->document = new Document();
        $this->document->addLink(new Link('stylesheet','text/css','/'.CORE_CSS.'/core.css'));
    }

    public function run(App $app) {
        new View($this);
        foreach ($this->children as $c) {
            $this->document->addContent($c->run($this,$this));
        }
        $this->document->render();
    }

    public function getDocument() {
        return $this->document;
    }

    public function getView() {
        return $this->view;
    }

    public function getRequest() {
        return $this->request;
    }

    private function rewrite() {
        $path = ltrim($_SERVER['REQUEST_URI'], '/');
        $elements = explode('/', $path);
        if(empty($elements[0])) {
            $this->addComponent(new UndefinedViewNotice());
        } else {
            $this->view = $elements[0];
            $this->request = $elements;
        }
    }

    public function debugLayout($doDebug,$all) {
        if ($doDebug) {
            $this->document->addBaseTheme('debug');
            if ($all) {
                $this->document->addBaseTheme('all');
            }
        }
    }
}
?>