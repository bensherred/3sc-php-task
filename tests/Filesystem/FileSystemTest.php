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

        $fullPath = $parent->getPath() . '/' . $parent->getName() . '/' . $directory->getName();

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

    public function test_it_can_rename_a_directory()
    {
        $directory = DirectoryFactory::create();
        $this->fileSystem->createRootDirectory($directory);

        $oldName = $directory->getName();
        $newName = $this->faker->words($this->faker->numberBetween(4, 5), true);

        $this->assertTrue(is_dir($directory->getPath() . '/' . $oldName));

        $this->fileSystem->renameDirectory($directory, $newName);

        $this->assertTrue(is_dir($directory->getPath() . '/' . $newName));
        $this->assertFalse(is_dir($directory->getPath() . '/' . $oldName));
        $this->assertSame($directory->getName(), $newName);
    }

    public function test_it_can_get_the_directory_count_for_a_folder()
    {
        $directory = DirectoryFactory::create();
        $parent = $this->fileSystem->createRootDirectory($directory);

        $emptyCount = $this->fileSystem->getDirectoryCount($parent);

        $this->assertIsInt($emptyCount);
        $this->assertSame(0, $emptyCount);

        $this->fileSystem->createDirectory(DirectoryFactory::create(), $parent);

        $this->assertSame(1, $this->fileSystem->getDirectoryCount($parent));
    }
}
