<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 25-Oct-17
 */

namespace Smith\ORM\DataMapper;


interface EntityInterface {

    /**
     * @return RecordInterface
     */
    public function toRecord();

    /**
     * @param RecordInterface $record
     * @return self
     */
    public static function fromRecord(RecordInterface $record);
}