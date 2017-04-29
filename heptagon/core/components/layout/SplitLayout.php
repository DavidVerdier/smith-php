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
        $container = new Div();
        $container->addStyle('SplitLayout '.$this->direction);
        $container->addStyle($this->styles);
        for ($i=0 ; $i<$this->areas ; $i++) {
            $area = new Div();
            $area->addStyle('SplitLayoutArea');
            $container->addChild($area);
            if ($i<count($this->children)) {
                $area->addChild($this->children[$i]->run($app));
            }
        }
        return $container;
    }
}
?>