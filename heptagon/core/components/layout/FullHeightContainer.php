<?php
class FullHeightContainer extends Component {

    public function run(App $app) {
        $container = new Div();
        $container->addStyle('FullHeightContainer');
        $container->addStyle($this->styles);
        foreach ($this->children as $c) {
            $container->addChild($c->run($app));
        }
        return $container;
    }
}
?>