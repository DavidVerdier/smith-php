<?php
class View {
    public function __construct(App $app) {
        if (!@include(VIEWS.'/'.$app->getView().'.php')) {
            die('View "'.$app->getView().'" is not defined.');
        }
    }
}
?>