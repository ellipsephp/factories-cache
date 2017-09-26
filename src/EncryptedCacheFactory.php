<?php

namespace Ellipse\Factories;

use Psr\Cache\CacheItemPoolInterface;

use Cache\Taggable\TaggablePSR6PoolAdapter;
use Cache\Encryption\EncryptedCachePool;

use Defuse\Crypto\Key;

class EncryptedCacheFactory
{
    /**
     * Allow to use the factory statically.
     *
     * @param Psr\Cache\CacheItemPoolInterface  $cache
     * @param string                            $str
     * @return Psr\Cache\CacheItemPoolInterface
     */
    public static function create(CacheItemPoolInterface $cache, string $str): CacheItemPoolInterface
    {
        return (new EncryptedCacheFactory)($cache, $str);
    }

    /**
     * Make a new encrypted cache using the given cache and the given encryption
     * key.
     *
     * @param Psr\Cache\CacheItemPoolInterface  $cache
     * @param string                            $str
     * @return Psr\Cache\CacheItemPoolInterface
     */
    public function __invoke(CacheItemPoolInterface $cache, string $str): CacheItemPoolInterface
    {
        $taggable = TaggablePSR6PoolAdapter::makeTaggable($cache);

        $key = Key::loadFromAsciiSafeString($str);

        return new EncryptedCachePool($taggable, $key);
    }
}
