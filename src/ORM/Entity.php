<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 27/10/2017
 */

namespace Smith\ORM;


use Smith\ORM\DataMapper\EntityInterface;
use Smith\ORM\DataMapper\RecordInterface;

class Entity implements EntityInterface {

    public function toRecord() {
        // TODO: Implement toRecord() method.
    }

    public static function fromRecord(RecordInterface $record) {
        // TODO: Implement fromRecord() method.
    }
}