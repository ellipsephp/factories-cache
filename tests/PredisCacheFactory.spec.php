<?php

use Cache\Adapter\Predis\PredisCachePool;

use Predis\Client;

use Ellipse\Cache\PredisCacheFactory;

describe('PredisCacheFactory', function () {

    afterEach(function () {

        Mockery::close();

    });

    describe('::create()', function () {

        it('should proxy the ->__invoke() method', function () {

            $client = Mockery::mock(Client::class);

            $test = (new PredisCacheFactory)($client);

            expect($test)->to->be->an->instanceof(PredisCachePool::class);

        });

    });

    describe('->__invoke()', function () {

        it('should return a new PredisCachePool using the given predis client', function () {

            $client = Mockery::mock(Client::class);

            $factory = new PredisCacheFactory;

            $test = $factory($client);

            expect($test)->to->be->an->instanceof(PredisCachePool::class);

        });

    });

});
