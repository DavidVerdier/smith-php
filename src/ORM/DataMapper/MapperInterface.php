<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26-Oct-17
 */

namespace Smith\ORM\DataMapper;


interface MapperInterface {

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param EntityInterface $model
     * @return mixed
     */
    public function insert(EntityInterface $model);

    /**
     * @param EntityInterface $model
     * @return mixed
     */
    public function update(EntityInterface $model);

    /**
     * @param EntityInterface $model
     * @return mixed
     */
    public function delete(EntityInterface $model);
}
