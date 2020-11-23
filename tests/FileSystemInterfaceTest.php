<?php

namespace Tsc\CatStorageSystem\Tests;

use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\FileSystemInterface;

class FileSystemInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder(FileSystemInterface::class)->getMock();
        $this->assertTrue($stub instanceof FileSystemInterface);
    }
}
