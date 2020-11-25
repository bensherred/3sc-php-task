<?php

namespace Tsc\CatStorageSystem\Tests\Factories;

use Tsc\CatStorageSystem\Factories\FileFactory;
use Tsc\CatStorageSystem\Filesystem\File;
use Tsc\CatStorageSystem\Tests\TestCase;

class FileFactoryTest extends TestCase
{
    public function test_it_returns_an_instance_of_file()
    {
        $file = FileFactory::create();

        $this->assertInstanceOf(File::class, $file);
    }
}
