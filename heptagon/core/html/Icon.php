<?php 
class Icon extends Element {

    public function __construct(string $icon, string $size = 'lg') {
        parent::__construct();
        $this->tag = 'i';
        $this->selfClosing = false;
        $this->addStyle('fa fa-'.$size.' fa-'.$icon);
    }
}
?>