<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\DependencyInjection;


class Rack {

    private $current = 0;

    private $count = 0;

    private $items = array();

    /**
     * @param $item
     */
    public function add($item) {
        $this->items[] = $item;
        $this->count++;
    }

    /**
     * @return mixed|null
     */
    public function next() {
        if ($this->count >= $this->current) {
            $output = $this->items[$this->current];
            $this->current++;
            return $output;
        } else {
            return null;
        }
    }

    /**
     *
     */
    public function reset() {
        $this->current = 0;
    }
}
