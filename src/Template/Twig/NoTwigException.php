<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 21-Oct-17
 * Time: 11:58
 */

namespace Smith\Template\Twig;


use Throwable;

class NoTwigException extends \Exception {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct("Cannot find a Twig installation. Run 'composer require twig/twig'."
            , $code, $previous);
    }
}
