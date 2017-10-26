<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 26/10/2017
 * Time: 14:43
 */

namespace Smith\Cache;


use Smith\Serialization\Hashable;

interface Cacheable extends Hashable {

    /**
     * @return CacheManagerInterface
     */
    public static function getCacheManager();
}
