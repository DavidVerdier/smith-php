<?php
/**
 * Copyright @ Etienne "Eethe" Orlhac
 * Date: 22-Oct-17
 */

namespace Smith\Routing;


use Throwable;

class ActionNotImplementedException extends \Exception {

    public function __construct($action) {
        parent::__construct("Action ". $action ." is not implemented.", 0, null);
    }
}