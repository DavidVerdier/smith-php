<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26-Oct-17
 */

namespace Smith\ORM\DataMapper;


interface StorageAdapterInterface {

    /**
     * @param $id
     * @return RecordInterface
     */
    public function find($id);

    /**
     * @return RecordInterface[]
     */
    public function findAll();

    /**
     * @param RecordInterface $model
     * @return mixed
     */
    public function insert(RecordInterface $model);

    /**
     * @param RecordInterface $model
     * @return mixed
     */
    public function update(RecordInterface $model);

    /**
     * @param RecordInterface $model
     * @return mixed
     */
    public function delete(RecordInterface $model);
}
