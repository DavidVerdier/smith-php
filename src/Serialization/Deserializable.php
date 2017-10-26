<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 26/10/2017
 * Time: 14:27
 */

namespace Smith\Serialization;


interface Deserializable {
    /**
     * @param string $data
     * @return self
     */
    public static function deserialize(string $data);
}