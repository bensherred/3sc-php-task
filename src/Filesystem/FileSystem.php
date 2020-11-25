<?php

namespace Tsc\CatStorageSystem\Filesystem;

use DateTime;
use Tsc\CatStorageSystem\Contracts\AdapterInterface;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Contracts\FileInterface;
use Tsc\CatStorageSystem\Contracts\FileSystemInterface;

class FileSystem implements FileSystemInterface
{
    /**
     * The instance of the filesystem adapter.
     *
     * @var AdapterInterface
     */
    protected AdapterInterface $adapter;

    /**
     * Create a new FileSystem instance and init the adapter.
     *
     * @param  AdapterInterface  $adapter
     * @return void
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = new $adapter();
    }

    /**
     * Create the specified file in the specified directory.
     *
     * @param  FileInterface  $file
     * @param  DirectoryInterface  $parent
     * @return FileInterface
     */
    public function createFile(FileInterface $file, DirectoryInterface $parent): FileInterface
    {
        $this->adapter->makeFile($parent->getPath() . '/' . $parent->getName(), $file->getName());

        $file->setParentDirectory($parent);

        return $file;
    }

    /**
     * Update the specified file.
     *
     * @param  FileInterface  $file
     * @return FileInterface
     */
    public function updateFile(FileInterface $file): FileInterface
    {
        $path = $file->getPath() . '/' . $file->getName();
        $this->adapter->updateFile($path, $file->getModifiedTime()->getTimestamp());

        return $file;
    }

    /**
     * Rename the specified file.
     *
     * @param  FileInterface  $file
     * @param  string  $newName
     * @return FileInterface
     */
    public function renameFile(FileInterface $file, string $newName): FileInterface
    {
        $this->adapter->rename($file->getPath(), $file->getPath(), $newName);

        $file->setName($newName);

        return $file;
    }

    /**
     * Delete the specified file.
     *
     * @param  FileInterface  $file
     * @return bool
     */
    public function deleteFile(FileInterface $file): bool
    {
        return $this->adapter->deleteFile($file->getPath() . '/' . $file->getName());
    }

    /**
     * Create the root directory.
     *
     * @param  DirectoryInterface  $directory
     * @return DirectoryInterface
     */
    public function createRootDirectory(DirectoryInterface $directory): DirectoryInterface
    {
        $this->adapter->makeDirectory($directory->getPath() . '/' . $directory->getName());

        return $directory;
    }

    /**
     * Create the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @param  DirectoryInterface  $parent
     * @return DirectoryInterface
     */
    public function createDirectory(DirectoryInterface $directory, DirectoryInterface $parent): DirectoryInterface
    {
        $parentPath = $parent->getPath() . '/' . $parent->getName();
        $path = $parentPath . '/' . $directory->getName();

        $this->adapter->makeDirectory($path);

        $directory->setPath($parentPath);

        return $directory;
    }

    /**
     * Delete the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return bool
     */
    public function deleteDirectory(DirectoryInterface $directory): bool
    {
        return $this->adapter->deleteDirectory($directory->getPath() . '/' . $directory->getName());
    }

    /**
     * Rename the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @param  string  $newName
     * @return DirectoryInterface
     */
    public function renameDirectory(DirectoryInterface $directory, string $newName): DirectoryInterface
    {
        $this->adapter->rename($directory->getPath(), $directory->getName(), $newName);

        $directory->setName($newName);

        return $directory;
    }

    /**
     * Get the number of directories in the specified folder.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getDirectoryCount(DirectoryInterface $directory): int
    {
        $path = $directory->getPath() . '/' . $directory->getName();

        return count($this->adapter->directories($path));
    }

    /**
     * Get the number of files in the specified folder.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getFileCount(DirectoryInterface $directory): int
    {
        $path = $directory->getPath() . '/' . $directory->getName();

        return count($this->adapter->files($path));
    }

    /**
     * Get the size of the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getDirectorySize(DirectoryInterface $directory): int
    {
        $path = $directory->getPath() . '/' . $directory->getName();

        return $this->adapter->directorySize($path);
    }

    /**
     * Get the directories within the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return DirectoryInterface[]
     */
    public function getDirectories(DirectoryInterface $directory): array
    {
        $directories = [];

        $path = $directory->getPath() . '/' . $directory->getName();
        $items = $this->adapter->directories($path);

        foreach ($items as $item) {
            $directories[] = (new Directory())
                ->setName($item->getFilename())
                ->setCreatedTime(
                    (new DateTime())->setTimestamp($item->getCTime())
                )
                ->setPath($path);
        }

        return $directories;
    }

    /**
     * Get the files within the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return FileInterface[]
     */
    public function getFiles(DirectoryInterface $directory): array
    {
        $files = [];

        $path = $directory->getPath() . '/' . $directory->getName();
        $items = $this->adapter->files($path);

        foreach ($items as $item) {
            $files[] = (new File())
                ->setName($item->getFilename())
                ->setSize($item->getSize())
                ->setCreatedTime(
                    (new DateTime())->setTimestamp($item->getCTime())
                )
                ->setModifiedTime(
                    (new DateTime())->setTimestamp($item->getMTime())
                )
                ->setParentDirectory($directory);
        }

        return $files;
    }
}
