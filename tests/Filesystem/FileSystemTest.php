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
        $fullPath = $rootFolder->getPath() . '/' . $rootFolder->getName();

        $this->assertFalse(is_dir($fullPath));

        $this->fileSystem->createRootDirectory($rootFolder);

        $this->assertTrue(is_dir($fullPath));
    }

    public function test_it_create_a_directory()
    {
        $parent = DirectoryFactory::create();
        $this->fileSystem->createRootDirectory($parent);

        $directory = DirectoryFactory::create();

        $fullPath = $parent->getPath() . '/' . $directory->getName();

        $this->assertFalse(is_dir($fullPath));

        $this->fileSystem->createDirectory($directory, $parent);

        $this->assertTrue(is_dir($fullPath));
    }

    public function test_it_can_delete_a_directory()
    {
        $directory = DirectoryFactory::create();
        $this->fileSystem->createRootDirectory($directory);

        $fullPath = $directory->getPath() . '/' . $directory->getName();

        $this->assertTrue(is_dir($fullPath));

        $this->fileSystem->deleteDirectory($directory);

        $this->assertFalse(is_dir($fullPath));
    }
}
