<?php

namespace Tsc\CatStorageSystem\Tests\Contracts;

use Tsc\CatStorageSystem\Contracts\FileInterface;
use Tsc\CatStorageSystem\Tests\TestCase;

class FileInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder(FileInterface::class)->getMock();
        $this->assertInstanceOf(FileInterface::class, $stub);
    }
}
