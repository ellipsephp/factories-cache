<?php declare(strict_types=1);

namespace Ellipse\Cache;

use Interop\Container\ServiceProviderInterface;

use Ellipse\Cache\FilesystemCacheFactory;
use Ellipse\Cache\PredisCacheFactory;
use Ellipse\Cache\EncryptedCacheFactory;

class CacheServiceProvider implements ServiceProviderInterface
{
    public function getFactories()
    {
        return [
            FilesystemCacheFactory::class => function () {

                return new FilesystemCacheFactory;

            },

            PredisCacheFactory::class => function () {

                return new PredisCacheFactory;

            },

            EncryptedCacheFactory::class => function () {

                return new EncryptedCacheFactory;

            },
        ];
    }

    public function getExtensions()
    {
        return [];
    }
}
