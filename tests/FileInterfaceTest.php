<?php

namespace Tsc\CatStorageSystem\Tests;

use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\FileInterface;

class FileInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder(FileInterface::class)->getMock();
        $this->assertTrue($stub instanceof FileInterface);
    }
}
