<?php declare(strict_types=1);

namespace Ellipse\Cache;

use Interop\Container\ServiceProvider;

use Ellipse\Cache\Factories\FilesCacheFactory;
use Ellipse\Cache\Factories\RedisCacheFactory;
use Ellipse\Cache\Factories\EncryptedCacheFactory;

class CacheServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return [
            FilesCacheFactory::class => function ($container) {

                return new FilesCacheFactory;

            },

            RedisCacheFactory::class => function ($container) {

                return new RedisCacheFactory;

            },

            EncryptedCacheFactory::class => function ($container) {

                return new EncryptedCacheFactory;

            },
        ];
    }
}
