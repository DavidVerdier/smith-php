<?php
class UndefinedViewNotice extends Component {
    public function run(App $app) {
        $doc = $app->getDocument();
        return new Paragraph('DefaultView : no view has been defined before application execution.');
    }
}
?>