<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 26/10/2017
 */

namespace Smith\Cache;


class GenericFileSystemCacheManager implements CacheManager {

    private $cachePath;

    public function __construct(string $cachePath) {
        if (!is_dir($cachePath)) {
            throw new \Exception($cachePath."is not a valid directory.");
        }
        $this->cachePath = $cachePath;
    }

    public function hasKey(string $key) {
        return file_exists($this->cachePath . $key);
    }

    public function push(string $key, Cacheable $item) {
        file_put_contents($this->cachePath . $key, $item);
    }

    public function get(string $key) {
        return file_get_contents($this->cachePath . $key);
    }

    public function invalidate(string $key) {
        if ($this->hasKey($key)) {
            unlink($this->cachePath . $key);
        }
    }
}