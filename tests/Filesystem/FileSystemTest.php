<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem;

use Tsc\CatStorageSystem\Factories\DirectoryFactory;
use Tsc\CatStorageSystem\Filesystem\FileSystem;
use Tsc\CatStorageSystem\Tests\TestCase;

class FileSystemTest extends TestCase
{
    protected FileSystem $fileSystem;

    /**
     * Setup the test suite and create a new filesystem instance before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->fileSystem = new FileSystem();
    }

    public function test_it_can_create_a_root_directory()
    {
        $rootFolder = DirectoryFactory::create();

        $this->assertFalse(is_dir($rootFolder->getPath()));

        $this->fileSystem->createRootDirectory($rootFolder);

        $this->assertTrue(is_dir($rootFolder->getPath()));
    }

    public function test_it_create_a_directory()
    {
        $parent = DirectoryFactory::create();
        $this->fileSystem->createRootDirectory($parent);

        $directory = DirectoryFactory::create();

        $path = $parent->getPath() . '/' . $directory->getName();

        $this->assertFalse(is_dir($path));

        $this->fileSystem->createDirectory($directory, $parent);

        $this->assertTrue(is_dir($path));
        $this->assertSame($path, $directory->getPath());
    }

    public function test_it_can_delete_a_directory()
    {
        $directory = DirectoryFactory::create();
        $this->fileSystem->createRootDirectory($directory);

        $this->assertTrue(is_dir($directory->getPath()));

        $this->fileSystem->deleteDirectory($directory);

        $this->assertFalse(is_dir($directory->getPath()));
    }
}
