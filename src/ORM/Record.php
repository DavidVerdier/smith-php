<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 27/10/2017
 */

namespace Smith\ORM;


use Smith\ORM\DataMapper\RecordInterface;

class Record implements RecordInterface {

    private $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function push(string $key, $var) {
        $this->data[$key] = $var;
    }

    public function get(string $key) {
        return $this->data;
    }
}
