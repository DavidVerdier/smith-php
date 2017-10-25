<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\Framework\Configuration;


use Throwable;

class CircularImportException extends \Exception {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct("Import loop detected.", $code, $previous);
    }
}
