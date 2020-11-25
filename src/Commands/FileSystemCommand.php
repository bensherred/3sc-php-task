<?php

namespace Tsc\CatStorageSystem\Commands;

use Symfony\Component\Console\Command\Command;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Filesystem\Adapters\LocalAdapter;
use Tsc\CatStorageSystem\Filesystem\Directory;
use Tsc\CatStorageSystem\Filesystem\FileSystem;

class FileSystemCommand extends Command
{
    /**
     * An instance of the filesystem.
     *
     * @var FileSystem
     */
    protected FileSystem $fileSystem;

    /**
     * The root directory where the cat images are stored.
     *
     * @var DirectoryInterface
     */
    protected DirectoryInterface $rootDirectory;

    /**
     * Create a new cat command instance.
     *
     * @param  string|null  $name
     * @return void
     */
    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $this->fileSystem = new FileSystem(
            new LocalAdapter()
        );

        $this->rootDirectory = (new Directory())
            ->setName('images')
            ->setPath('.');
    }
}
