<?php

namespace Ellipse\Cache;

use Psr\Cache\CacheItemPoolInterface;

use Cache\Adapter\Predis\PredisCachePool;

use Predis\Client;

class PredisCacheFactory
{
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
