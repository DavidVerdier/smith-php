<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 27/10/2017
 */

namespace Smith\ORM;


use Smith\ORM\DataMapper\MapperInterface;
use Smith\ORM\DataMapper\EntityInterface;

class Mapper implements MapperInterface {

    public function __construct() {

    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function findAll() {
        // TODO: Implement findAll() method.
    }

    public function insert(EntityInterface $model) {
        // TODO: Implement insert() method.
    }

    public function update(EntityInterface $model) {
        // TODO: Implement update() method.
    }

    public function delete(EntityInterface $model) {
        // TODO: Implement delete() method.
    }
}