<?php

namespace Tsc\CatStorageSystem\Filesystem\Adapters;

use DirectoryIterator;
use SplFileInfo;
use Tsc\CatStorageSystem\Contracts\AdapterInterface;

class LocalAdapter implements AdapterInterface
{
    /**
     * Get all the files within the specified directory.
     *
     * @param  string  $path
     * @return SplFileInfo[]
     */
    public function files(string $path): array
    {
        $files = [];

        foreach ($this->getDirectoryItems($path) as $item) {
            if ($item->isDir() || $item->isDot()) {
                continue;
            }

            $files[] = $item->getFileInfo();
        }

        return $files;
    }

    /**
     * Create a file in the specified directory.
     *
     * @param  string  $path
     * @param  string  $name
     * @return SplFileInfo
     */
    public function makeFile(string $path, string $name): SplFileInfo
    {
        $fullPath = $path . '/' . $name;

        touch($fullPath);

        return new SplFileInfo($fullPath);
    }

    /**
     * Update the specified file.
     *
     * @param  string  $path
     * @param  int  $time
     * @return SplFileInfo
     */
    public function updateFile(string $path, int $time): SplFileInfo
    {
        touch($path, $time);

        // Clear the file status cache due to modify mt time
        clearstatcache();

        return new SplFileInfo($path);
    }

    /**
     * Delete the specified file.
     *
     * @param  string  $path
     * @return bool
     */
    public function deleteFile(string $path): bool
    {
        return unlink($path);
    }

    /**
     * Get a list of directories within the parent directory.
     *
     * @param  string  $path
     * @return SplFileInfo[]
     */
    public function directories(string $path): array
    {
        $directories = [];

        foreach ($this->getDirectoryItems($path) as $item) {
            if (! $item->isDir() || $item->isDot()) {
                continue;
            }

            $directories[] = $item->getFileInfo();
        }

        return $directories;
    }

    /**
     * Get the size of the specified directory.
     *
     * @param  string  $path
     * @return int
     */
    public function directorySize(string $path): int
    {
        return (new SplFileInfo($path))->getSize();
    }

    /**
     * Make the specified directory.
     *
     * @param  string  $path
     * @return SplFileInfo
     */
    public function makeDirectory(string $path): SplFileInfo
    {
        mkdir($path);

        return new SplFileInfo($path);
    }

    /**
     * Delete the specified directory.
     *
     * @param  string  $path
     * @return bool
     */
    public function deleteDirectory(string $path): bool
    {
        return rmdir($path);
    }

    /**
     * Get the files and directories within the specified path.
     *
     * @param  string  $path
     * @return DirectoryIterator
     */
    protected function getDirectoryItems(string $path)
    {
        return new DirectoryIterator($path);
    }

    /**
     * Rename the specified directory or file
     *
     * @param  string  $path
     * @param  string  $oldName
     * @param  string  $newName
     * @return SplFileInfo
     */
    public function rename(string $path, string $oldName, string $newName): SplFileInfo
    {
        $oldPath = $path . '/' . $oldName;
        $newPath = $path . '/' . $newName;

        rename($oldPath, $newPath);

        return new SplFileInfo($newPath);
    }
}
