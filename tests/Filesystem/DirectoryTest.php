<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem;

use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Filesystem\Directory;
use Tsc\CatStorageSystem\Tests\TestCase;

class DirectoryTest extends TestCase
{
    /**
     * An instance of Directory to use within the testsuite.
     *
     * @var Directory
     */
    protected Directory $directory;

    /**
     * Configure the test before it's run. This method is called
     * before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = new Directory();
    }

    public function test_it_implements_the_directory_interface()
    {
        $file = $this->getMockBuilder(Directory::class)->getMock();
        $this->assertInstanceOf(DirectoryInterface::class, $file);
    }

    public function test_it_can_set_and_get_the_name()
    {
        $this->directory->setName($name = $this->faker->word);

        $this->assertIsString($this->directory->getName());
        $this->assertSame($name, $this->directory->getName());
    }
}
