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
        $container = new ButtonInput($this->action, '');
        $container->addStyle('Button '.$this->direction);
        $container->addStyle($this->styles);

        if ($this->icon) {
            $this->icon->addStyle('ButtonIcon');
            $container->addChild($this->icon);
        }
        
        if ($this->label) {
            $label = new Span($this->label);
            $label->addStyle('ButtonLabel');
            $container->addChild($label);
        }
        return $container;
    }
}
?>