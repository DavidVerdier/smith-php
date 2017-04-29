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
        $container = new Div();
        $container->addStyle('BorderLayout');
        $container->addStyle($this->styles);

        $north= new Div();
        $north->addStyle('BorderLayoutNorth');
        $north->addChild($this->children['north']->run($app));

        $wrap= new Div();
        $wrap->addStyle('BorderLayoutWrap');

        $west= new Div();
        $west->addStyle('BorderLayoutWest');
        $west->addChild($this->children['west']->run($app));

        $east= new Div();
        $east->addStyle('BorderLayoutEast');
        $east->addChild($this->children['east']->run($app));

        $center= new Div();
        $center->addStyle('BorderLayoutCenter');
        $center->addChild($this->children['center']->run($app));

        $wrap->addChild($west);
        $wrap->addChild($center);
        $wrap->addChild($east);

        $south= new Div();
        $south->addStyle('BorderLayoutSouth');
        $south->addChild($this->children['south']->run($app));

        $container->addChild($north);
        $container->addChild($wrap);
        $container->addChild($south);

        return $container;
    }
}
?>