<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26/10/2017
 */

namespace Smith\DependencyInjection;


class ParamDistributor {

    private $alreadyGiven;

    private $params;

    /**
     * ParamDistributor constructor.
     * @param array $params
     */
    public function __construct(array $params) {
        $this->alreadyGiven = array();
        $this->params = $params;
    }

    /**
     * @param string $type
     * @return mixed|null
     */
    public function next(string $type) {
        foreach ($this->params as $key => $value) {
            if (!in_array($key, $this->alreadyGiven)) {
                if (Types::isOfType($value, $type)) {
                    $this->alreadyGiven[] = $key;
                    return $value;
                }
            }
        }
        return null;
    }
}