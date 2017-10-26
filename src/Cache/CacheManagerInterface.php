<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26/10/2017
 */

namespace Smith\Cache;


interface CacheManagerInterface {

    /**
     * Returns true if this manager has an entry for this key.
     * @param string $key
     * @return boolean
     */
    public function hasKey(string $key);

    /**
     * Creates a new cache entry for the item and returns its key.
     * @param string $key
     * @param Cacheable $item
     * @return string
     */
    public function push(Cacheable $item);

    /**
     * Fetches the entry for this key.
     * @param string $key
     * @return Cacheable
     */
    public function get(string $key);

    /**
     * Removes a stale entry.
     * @param string $key
     */
    public function invalidate(string $key);
}
