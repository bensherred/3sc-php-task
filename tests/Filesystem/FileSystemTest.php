<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem;

use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Contracts\FileInterface;
use Tsc\CatStorageSystem\Factories\DirectoryFactory;
use Tsc\CatStorageSystem\Factories\FileFactory;
use Tsc\CatStorageSystem\Filesystem\Adapters\LocalAdapter;
use Tsc\CatStorageSystem\Filesystem\FileSystem;
use Tsc\CatStorageSystem\Tests\TestCase;

class FileSystemTest extends TestCase
{
    /**
     * The instance of the filesystem.
     *
     * @var FileSystem
     */
    protected FileSystem $fileSystem;

    /**
     * The root directory for storing temp test files.
     *
     * @var DirectoryInterface
     */
    protected DirectoryInterface $rootDirectory;

    /**
     * Setup the test suite and create a new filesystem instance before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->fileSystem = new FileSystem(
            new LocalAdapter()
        );

        $this->rootDirectory = DirectoryFactory::create()
            ->setName('testing-tmp')
            ->setPath('.');
    }

    public function test_it_returns_an_array_of_directory_interfaces()
    {
        $parentDirectory = DirectoryFactory::create();
        $this->fileSystem->createDirectory($parentDirectory, $this->rootDirectory);

        $directory = DirectoryFactory::create();
        $this->fileSystem->createDirectory($directory, $parentDirectory);

        $directories = $this->fileSystem->getDirectories($parentDirectory);

        $this->assertCount(1, $directories);
        $this->assertSame(1, $this->fileSystem->getDirectoryCount($parentDirectory));
        $this->assertInstanceOf(DirectoryInterface::class, $directories[0]);
    }

    public function test_it_returns_an_array_of_file_interfaces()
    {
        $directory = DirectoryFactory::create();
        $this->fileSystem->createDirectory($directory, $this->rootDirectory);

        $file = FileFactory::create();
        $this->fileSystem->createFile($file, $directory);

        $files = $this->fileSystem->getFiles($directory);

        $this->assertCount(1, $files);
        $this->assertSame(1, $this->fileSystem->getFileCount($directory));
        $this->assertInstanceOf(FileInterface::class, $files[0]);
    }
}
