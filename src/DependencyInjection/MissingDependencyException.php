<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\DependencyInjection;


use Throwable;

class MissingDependencyException extends \Exception {

    public function __construct($expected, $code = 0, Throwable $previous = null) {
        parent::__construct("Expecting more instances of ".$expected.".",
            $code, $previous);
    }
}