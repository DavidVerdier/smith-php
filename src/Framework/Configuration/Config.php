<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\Framework\Configuration;


class Config extends \stdClass {

    private $configDir;

    private $alreadyImported = array();

    /**
     * Config constructor.
     * @param string $file
     */
    public function __construct(string $file) {
        $this->alreadyImported[] = $file;
        $this->configDir = pathinfo($file)["dirname"];
        $this->moveRoot($this->resolveImports($this->getJson($file)));
    }

    /**
     * @param string $file
     * @return mixed
     */
    private function getJson(string $file) {
        $json = json_decode(file_get_contents($file));
        if ($json === null) {
            throw new InvalidJsonException();
        }
        return $json;
    }

    /**
     * @param $json
     * @return array
     */
    private function resolveImports($json) {
        foreach ($json as $key => $value) {
            if (is_string($value)) {

                if (preg_match("<^@import:(.*)$>",$value,$matches)) {
                    if (in_array($this->configDir."/".$matches[1], $this->alreadyImported)) {
                        throw new CircularImportException();
                    }

                    $this->alreadyImported[] = $this->configDir."/".$matches[1];

                    if (is_array($json)) {
                        $json[$key] = $this->resolveImports($this->getJson($this->configDir."/".$matches[1]));
                    }

                    if (is_object($json)) {
                        $json->$key = $this->resolveImports($this->getJson($this->configDir."/".$matches[1]));
                    }
                }
            }
        }
        return $json;
    }

    /**
     * @param $json
     */
    private function moveRoot($json) {
        foreach ($json as $key => $value) {
            $this->$key = $value;
        }
    }

    public function has(string $key) {
        return isset($this->$key);
    }
}