<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 26/10/2017
 * Time: 14:22
 */

namespace Smith\Serialization;


interface Serializable {

    /**
     * @return string
     */
    public function serialize();
}