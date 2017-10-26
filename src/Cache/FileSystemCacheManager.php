<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26/10/2017
 */

namespace Smith\Cache;


abstract class FileSystemCacheManager implements CacheManagerInterface {

    private $cachePath;

    /**
     * FileSystemCacheManager constructor.
     * @param string $cachePath
     * @throws \Exception
     */
    public function __construct(string $cachePath) {
        if (!is_dir($cachePath)) {
            throw new \Exception($cachePath."is not a valid directory.");
        }
        $this->cachePath = $cachePath;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasKey(string $key) {
        return file_exists($this->cachePath . $key);
    }

    /**
     * @param string $key
     */
    public function remove(string $key) {
        if ($this->hasKey($key)) {
            unlink($this->cachePath . $key);
        }
    }
}
