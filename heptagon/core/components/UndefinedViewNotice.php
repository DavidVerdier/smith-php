<?php
class UndefinedViewNotice extends Component {
    public function run(App $app) {
        return new TextNode('DefaultView : no view has been defined before application execution.');
    }
}
?>
