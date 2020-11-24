<?php

namespace Tsc\CatStorageSystem\Tests\Contracts;

use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Contracts\FileInterface;

class FileInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder(FileInterface::class)->getMock();
        $this->assertInstanceOf(FileInterface::class, $stub);
    }
}
