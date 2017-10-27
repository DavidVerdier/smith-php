<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 27/10/2017
 */

namespace Smith\ORM\DataMapper;


interface RecordInterface {

    /**
     * @param string $key
     * @param $var
     */
    public function push(string $key, $var);

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);
}
