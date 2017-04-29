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
        $container = new Div();
        $container->addStyle('FlowLayout '.$this->direction);
        $container->addStyle($this->styles);
        foreach ($this->children as $c) {
            $area = new Div();
            $area->addStyle('FlowLayoutArea');
            $container->addChild($area);
            $area->addChild($c->run($app));
        }
        return $container;
    }
}
?>