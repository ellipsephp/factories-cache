<?php

namespace Ellipse\Cache\Factories;

use Psr\Cache\CacheItemPoolInterface;

use Defuse\Crypto\Key;

use Cache\Encryption\EncryptedCachePool;
use Cache\Taggable\TaggablePSR6PoolAdapter;

class EncryptedCacheFactory
{
    /**
     * Make a new encrypted cache using the given cache and the given encryption
     * key.
     *
     * @param Psr\Cache\CacheItemPoolInterface  $cache
     * @param string                            $key_str
     * @return Psr\Cache\CacheItemPoolInterface
     */
    public function __invoke(CacheItemPoolInterface $cache, string $key_str): CacheItemPoolInterface
    {
        $taggable = TaggablePSR6PoolAdapter::makeTaggable($cache);

        $key = Key::loadFromAsciiSafeString($key_str);

        return new EncryptedCachePool($taggable, $key);
    }
}
