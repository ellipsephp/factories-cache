<?php

namespace Ellipse\Cache;

use Psr\Cache\CacheItemPoolInterface;

use Cache\Adapter\Filesystem\FilesystemCachePool;

use League\Flysystem\Filesystem;

class FilesystemCacheFactory
{
    /**
     * Allow to use the factory statically.
     *
     * @param \League\Flysystem\Filesystem  $filesystem
     * @param string                        $folder
     * @return \Psr\Cache\CacheItemPoolInterface
     */
    public function create(Filesystem $filesystem, string $folder = '.'): CacheItemPoolInterface
    {
        return (new FilesystemCacheFactory)($filesystem, $folder);
    }

    /**
     * Make a new filesystem cache with the given flysystem driver.
     *
     * @param \League\Flysystem\Filesystem  $filesystem
     * @param string                        $folder
     * @return \Psr\Cache\CacheItemPoolInterface
     */
    public function __invoke(Filesystem $filesystem, string $folder = '.'): CacheItemPoolInterface
    {
        return new FilesystemCachePool($filesystem, $folder);
    }
}
