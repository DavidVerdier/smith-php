<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\DependencyInjection;


class Distributor {

    /**
     * @var Rack[]
     */
    private $racks = array();

    /**
     * @param $item
     * @param string $rack
     */
    public function add($item, string $rack) {
        if (!isset($this->racks[$rack])) {
            $this->racks[$rack] = new Rack();
        }
        $this->racks[$rack]->add($item);
    }

    /**
     * @param string $rack
     * @return mixed|null
     */
    public function next(string $rack) {
        if (!isset($this->racks[$rack])) {
            return null;
        }
        return $this->racks[$rack]->next();
    }

    /**
     *
     */
    public function reset() {
        foreach ($this->racks as $rack) {
            $rack->reset();
        }
    }
}
