<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26/10/2017
 */

namespace Smith\DependencyInjection;


class Types {

    private static $scalarTypeConversions = array(
        "integer" => "int",
        "boolean" => "bool",
        "float" => "double",
        "double" => "double",
        "real" => "double"
    );

    /**
     * @param string $type
     * @return mixed|string
     */
    public static function realScalarType(string $type) {
        if (isset(self::$scalarTypeConversions[$type])) {
            return self::$scalarTypeConversions[$type];
        } else {
            return $type;
        }
    }

    /**
     * @param $var
     * @return string
     */
    public static function getType($var) {
        $type = self::realScalarType(gettype($var));
        if ($type === "object") {
            $type = get_class($var);
        }
        return $type;
    }

    /**
     * @param $var
     * @param string $type
     * @return bool
     */
    public static function isOfType($var, string $type) {
        return ($var instanceof $type) || (self::getType($var) === $type) || (self::getType($var) === self::realScalarType($type));
    }
}