<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26/10/2017
 */

namespace Smith\Cache;


interface CacheManager {

    /**
     * @param string $key
     * @return boolean
     */
    public function hasKey(string $key);

    /**
     * @param string $key
     * @param Cacheable $item
     */
    public function push(string $key, Cacheable $item);

    /**
     * @param string $key
     * @return Cacheable
     */
    public function get(string $key);

    /**
     * @param string $key
     */
    public function invalidate(string $key);
}