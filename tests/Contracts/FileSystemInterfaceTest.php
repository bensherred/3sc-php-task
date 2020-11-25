<?php

namespace Tsc\CatStorageSystem\Tests\Contracts;

use Tsc\CatStorageSystem\Contracts\FileSystemInterface;
use Tsc\CatStorageSystem\Tests\TestCase;

class FileSystemInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder(FileSystemInterface::class)->getMock();
        $this->assertInstanceOf(FileSystemInterface::class, $stub);
    }
}
