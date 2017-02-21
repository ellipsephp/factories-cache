<?php

namespace Pmall\Cache\Factories;

use Psr\Cache\CacheItemPoolInterface;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

use Cache\Adapter\Filesystem\FilesystemCachePool;

class FilesCacheFactory
{
    /**
     * Make a new files cache at the given storage path.
     *
     * @param string $storage_path
     * @return Psr\Cache\CacheItemPoolInterface
     */
    public function __invoke(string $storage_path): CacheItemPoolInterface
    {
        $local = new Local($storage_path);

        $filesystem = new Filesystem($local);

        return new FilesystemCachePool($filesystem, '/');
    }
}
