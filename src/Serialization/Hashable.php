<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 26/10/2017
 * Time: 14:39
 */

namespace Smith\Serialization;


interface Hashable {
    /**
     * @return string
     */
    public function getHash();
}