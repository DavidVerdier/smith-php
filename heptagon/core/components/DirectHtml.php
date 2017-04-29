<?php
class DirectHtml extends Component {
    private $html;

    public function __construct(Element $html) {
        $this->html = $html;
    }

    public function run(App $app) {
        return $this->html;
    }
}
?>