<?php

use Cache\Adapter\Filesystem\FilesystemCachePool;

use League\Flysystem\Filesystem;

use Ellipse\Factories\FilesystemCacheFactory;

describe('FilesystemCacheFactory', function () {

    afterEach(function () {

        Mockery::close();

    });

    describe('::create()', function () {

        it('should proxy the ->__invoke() method', function () {

            $filesystem = Mockery::mock(Filesystem::class);

            $filesystem->shouldReceive('createDir')->once()->with('folder');

            $test = FilesystemCacheFactory::create($filesystem, 'folder');

            expect($test)->to->be->an->instanceof(FilesystemCachePool::class);

        });

    });

    describe('->__invoke()', function () {

        it('should return a new FilesystemCachePool using the given filesystem driven and folder', function () {

            $filesystem = Mockery::mock(Filesystem::class);

            $factory = new FilesystemCacheFactory;

            $filesystem->shouldReceive('createDir')->once()->with('folder');

            $test = $factory($filesystem, 'folder');

            expect($test)->to->be->an->instanceof(FilesystemCachePool::class);

        });

    });

});
