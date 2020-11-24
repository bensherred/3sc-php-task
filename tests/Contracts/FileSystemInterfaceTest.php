<?php

namespace Tsc\CatStorageSystem\Tests\Contracts;

use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Contracts\FileSystemInterface;

class FileSystemInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder(FileSystemInterface::class)->getMock();
        $this->assertInstanceOf(FileSystemInterface::class, $stub);
    }
}
