<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\DependencyInjection;

class AutoWirer {

    /**
     * @param \Closure $closure
     * @param array $params
     * @return mixed
     */
    public function wireClosure(\Closure $closure, array $params) {

        $reflect = new \ReflectionFunction($closure);

        return $this->wire($reflect,$params);
    }

    /**
     * @param $obj
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public function wireMethod($obj, string $method, array $params) {

        $reflect = new \ReflectionMethod($obj, $method);

        return $this->wire($reflect,$params);
    }


    /**
     * @param \ReflectionFunction|\ReflectionMethod $reflectedCallable
     * @param array $params
     * @return mixed[]
     * @throws MissingDependencyException
     */
    private function wire($reflectedCallable, array $params) {
        $newParams = array();

        $paramDistributor = new Distributor();
        foreach ($params as $param) {
            $paramDistributor->add($param,$this->getType($param));
        }

        $reflectParams = $reflectedCallable->getParameters();

        for ($i=0 ; $i < count($reflectParams) ; $i++) {
            $reflectParam = $reflectParams[$i];
            if ($reflectParam->hasType()) {
                $type = $reflectParam->getType();
                $matching = $paramDistributor->next($type);
                if (!($matching === null)) {
                    $newParams[] = $matching;
                } else {
                    throw new MissingDependencyException($type);
                }
            }
        }

        return $newParams;
    }

    /**
     * @param $var
     * @return string
     */
    private function getType($var) {
        $type = gettype($var);
        if ($type === "object") {
            $type = get_class($var);
        }
        return $type;
    }
}