<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26-Oct-17
 */

namespace Smith\ORM\DataMapper;


interface DataMapperInterface {

    public function find($id);

    public function findAll();

    public function insert(DomainModelInterface $model);

    public function update(DomainModelInterface $model);

    public function delete(DomainModelInterface $model);
}