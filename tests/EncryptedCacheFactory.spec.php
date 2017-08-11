<?php

use Psr\Cache\CacheItemPoolInterface;

use Cache\Encryption\EncryptedCachePool;

use Defuse\Crypto\Key;

use Ellipse\Cache\EncryptedCacheFactory;

describe('EncryptedCacheFactory', function () {

    afterEach(function () {

        Mockery::close();

    });

    describe('->__invoke()', function () {

        it('should return a new EncryptedCachePool using the given instance of CacheItemPoolInterface and encryption key', function () {

            $cache = Mockery::mock(CacheItemPoolInterface::class);
            $str = Key::createNewRandomKey()->saveToAsciiSafeString();

            $factory = new EncryptedCacheFactory;

            $test = $factory($cache, $str);

            expect($test)->to->be->an->instanceof(EncryptedCachePool::class);

        });

    });

});
