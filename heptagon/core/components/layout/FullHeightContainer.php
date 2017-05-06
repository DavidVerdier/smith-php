<?php
class FullHeightContainer extends Component {

    public function run(App $app) {
        $container = new HtmlNode('div');
        $container->addClass('FullHeightContainer');
        $container->addClass($this->styles);
        foreach ($this->children as $c) {
            $container->addChild($c->run($app));
        }
        return $container;
    }
}
?>