<?php
class EmptyComponent extends Component {
    public function run(App $app) {
        return new TextNode('');
    }
}
?>