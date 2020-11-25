<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem;

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
    }
}
