<?php
class SplitLayout extends Component {

    private $areas = 2; 

    private $direction = 'horizontal';

    public function setAreas(int $nbAreas) {
        $this->areas = $nbAreas;
    }

    public function setVertical() {
        $this->direction = 'vertical';
    }

    public function setHorizontal() {
        $this->direction = 'horizontal';
    }

    public function run(App $app) {
        $container = new HtmlNode('div');
        $container->addClass('SplitLayout '.$this->direction);
        $container->addClass($this->styles);
        for ($i=0 ; $i<$this->areas ; $i++) {
            $area = new HtmlNode('div');
            $area->addClass('SplitLayoutArea');
            $container->addChild($area);
            if ($i<count($this->children)) {
                $area->addChild($this->children[$i]->run($app));
            }
        }
        return $container;
    }
}
?>