<?php

namespace Tsc\CatStorageSystem\Filesystem;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Contracts\FileInterface;
use Tsc\CatStorageSystem\Contracts\FileSystemInterface;

class FileSystem implements FileSystemInterface
{
    /**
     * Create the specified file in the specified directory.
     *
     * @param  FileInterface  $file
     * @param  DirectoryInterface  $parent
     * @return FileInterface
     */
    public function createFile(FileInterface $file, DirectoryInterface $parent): FileInterface
    {
        // TODO: Implement createFile() method.
    }

    /**
     * Update the specified file.
     *
     * @param  FileInterface  $file
     * @return FileInterface
     */
    public function updateFile(FileInterface $file): FileInterface
    {
        // TODO: Implement updateFile() method.
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
        // TODO: Implement renameFile() method.
    }

    /**
     * Delete the specified file.
     *
     * @param  FileInterface  $file
     * @return bool
     */
    public function deleteFile(FileInterface $file): bool
    {
        // TODO: Implement deleteFile() method.
    }

    /**
     * Create the root directory.
     *
     * @param  DirectoryInterface  $directory
     * @return DirectoryInterface
     */
    public function createRootDirectory(DirectoryInterface $directory): DirectoryInterface
    {
        // TODO: check if folder already exists

        mkdir($directory->getPath() . '/' . $directory->getName());

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
        // TODO: check if folder already exists

        $path = $parent->getPath() . '/' . $parent->getName() . '/' . $directory->getName();

        mkdir($path);

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
        return rmdir($directory->getPath() . '/' . $directory->getName());
    }

    /**
     * Rename the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @param  string  $newName
     * @return DirectoryInterface
     */
    public function renameDirectory(DirectoryInterface $directory, string $newName): string
    {
        // TODO: check if folder actually exists

        rename(
            $directory->getPath() . '/' . $directory->getName(),
            $directory->getPath() . '/' . $newName
        );

        $directory->setName($newName);

        return $newName;
    }

    /**
     * Get the number of directories in the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getDirectoryCount(DirectoryInterface $directory): int
    {
        $path = $directory->getPath() . '/' . $directory->getName();

        return count(glob($path . '/*', GLOB_ONLYDIR));
    }

    /**
     * Get the number of files in the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getFileCount(DirectoryInterface $directory): int
    {
        // TODO: Implement getFileCount() method.
    }

    /**
     * Get the size of the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getDirectorySize(DirectoryInterface $directory): int
    {
        // TODO: Implement getDirectorySize() method.
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

        $directoryIterator = new RecursiveDirectoryIterator(
            $directory->getPath() . '/' . $directory->getName(),
            RecursiveDirectoryIterator::SKIP_DOTS
        );

        $subDirectories = new RecursiveIteratorIterator($directoryIterator, RecursiveIteratorIterator::SELF_FIRST);

        foreach ($subDirectories as $subDirectory) {
            if (! $subDirectory->isDir()) {
                continue;
            }

            $directories[] = (new Directory())
                ->setName($subDirectory->getFilename())
                ->setPath($subDirectory->getPath());
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
        $directoryFiles = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory->getPath() . '/' . $directory->getName())
        );

        foreach ($directoryFiles as $file) {
            if ($file->isDir()) {
                continue;
            }

            $files[] = (new File())
                ->setName($file->getFilename())
                ->setSize($file->getSize())
                ->setParentDirectory($directory);
        }

        return $files;
    }
}
