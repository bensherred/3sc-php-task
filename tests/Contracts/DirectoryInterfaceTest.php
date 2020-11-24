<?php

namespace Tsc\CatStorageSystem\Tests\Contracts;

use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;

class DirectoryInterfaceTest extends TestCase
{
    public function test_it_creates_a_new_instance()
    {
        $stub = $this->getMockBuilder( DirectoryInterface::class)->getMock();
        $this->assertInstanceOf(DirectoryInterface::class, $stub);
    }
}
