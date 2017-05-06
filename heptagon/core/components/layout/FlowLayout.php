<?php
class FlowLayout extends Component {

    private $direction = 'horizontal';

    public function setVertical() {
        $this->direction = 'vertical';
    }

    public function setHorizontal() {
        $this->direction = 'horizontal';
    }

    public function run(App $app) {
        $container = new HtmlNode('div');
        $container->addClass('FlowLayout '.$this->direction);
        $container->addClass($this->styles);
        foreach ($this->children as $c) {
            $area = new HtmlNode('div');
            $area->addClass('FlowLayoutArea');
            $container->addChild($area);
            $area->addChild($c->run($app));
        }
        return $container;
    }
}
?>