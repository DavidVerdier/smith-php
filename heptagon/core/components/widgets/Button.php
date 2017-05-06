<?php
class Button extends Component {
    private $icon;

    private $action;

    private $label;

    private $direction = 'horizontal';

    public function setVertical() {
        $this->direction = 'vertical';
    }

    public function setHorizontal() {
        $this->direction = 'horizontal';
    }

    public function __construct(string $action, Icon $icon = null, string $label = null) {
        $this->icon = $icon;
        $this->action = $action;
        $this->label = $label;
    }

    public function run(App $app) {
        $container = new HtmlNode('div', array('' => $this->action));
        $container->addClass('Button '.$this->direction);
        $container->addClass($this->styles);

        if ($this->icon) {
            $this->icon->addClass('ButtonIcon');
            $container->addChild($this->icon);
        }
        
        if ($this->label) {
            $label = new HtmlNode('span');
            $label->addClass('ButtonLabel')
                  ->addChild(new TextNode($this->label));
            $container->addChild($label);
        }
        return $container;
    }
}
?>