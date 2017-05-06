<?php
class BorderLayout extends Component {
    public function __construct() {
        $this->children['north'] = new EmptyComponent();
        $this->children['west'] = new EmptyComponent();
        $this->children['center'] = new EmptyComponent();
        $this->children['east'] = new EmptyComponent();
        $this->children['south'] = new EmptyComponent();
    }

    public function run(App $app) {
        $container = new HtmlNode('div');
        $container->addClass('BorderLayout');
        $container->addClass($this->styles);

        $north= new HtmlNode('div');
        $north->addClass('BorderLayoutNorth');
        $north->addChild($this->children['north']->run($app));

        $wrap= new HtmlNode('div');
        $wrap->addClass('BorderLayoutWrap');

        $west= new HtmlNode('div');
        $west->addClass('BorderLayoutWest');
        $west->addChild($this->children['west']->run($app));

        $east= new HtmlNode('div');
        $east->addClass('BorderLayoutEast');
        $east->addChild($this->children['east']->run($app));

        $center= new HtmlNode('div');
        $center->addClass('BorderLayoutCenter');
        $center->addChild($this->children['center']->run($app));

        $wrap->addChild($west);
        $wrap->addChild($center);
        $wrap->addChild($east);

        $south= new HtmlNode('div');
        $south->addClass('BorderLayoutSouth');
        $south->addChild($this->children['south']->run($app));

        $container->addChild($north);
        $container->addChild($wrap);
        $container->addChild($south);

        return $container;
    }
}
?>