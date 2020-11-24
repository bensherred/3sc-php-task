<?php

namespace Tsc\CatStorageSystem\Tests\Factories;

use Tsc\CatStorageSystem\Factories\DirectoryFactory;
use Tsc\CatStorageSystem\Filesystem\Directory;
use Tsc\CatStorageSystem\Tests\TestCase;

class DirectoryFactoryTest extends TestCase
{
    public function test_it_returns_an_instance_of_directory()
    {
        $directory = DirectoryFactory::create();

        $this->assertInstanceOf(Directory::class, $directory);
    }
}
