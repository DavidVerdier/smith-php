<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 25-Oct-17
 */

namespace Smith\Framework\Configuration;


use Throwable;

class InvalidJsonException extends \Exception {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct("Json parse error.", $code, $previous);
    }
}
