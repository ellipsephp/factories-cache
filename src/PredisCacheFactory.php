<?php

namespace Ellipse\Factories;

use Psr\Cache\CacheItemPoolInterface;

use Cache\Adapter\Predis\PredisCachePool;

use Predis\Client;

class PredisCacheFactory
{
    /**
     * Allow to use the factory statically.
     *
     * @param \Predis\Client $client
     * @return \Psr\Cache\CacheItemPoolInterface
     */
    public static function create(Client $client): CacheItemPoolInterface
    {
        return new PredisCachePool($client);
    }

    /**
     * Make a new redis cache using the given predis client.
     *
     * @param \Predis\Client $client
     * @return \Psr\Cache\CacheItemPoolInterface
     */
    public function __invoke(Client $client): CacheItemPoolInterface
    {
        return new PredisCachePool($client);
    }
}
