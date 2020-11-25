<?php

namespace Tsc\CatStorageSystem\Contracts;

use SplFileInfo;

interface AdapterInterface
{
    /**
     * Get all the files within the specified directory.
     *
     * @param  string  $path
     * @return SplFileInfo[]
     */
    public function files(string $path): array;

    /**
     * Create a file in the specified directory.
     *
     * @param  string  $path
     * @param  string  $name
     * @return SplFileInfo
     */
    public function makeFile(string $path, string $name): SplFileInfo;

    /**
     * Update the specified file.
     *
     * @param  string  $path
     * @param  int  $time
     * @return SplFileInfo
     */
    public function updateFile(string $path, int $time): SplFileInfo;

    /**
     * Delete the specified file.
     *
     * @param  string  $path
     * @return bool
     */
    public function deleteFile(string $path): bool;

    /**
     * Get a list of directories within the parent directory.
     *
     * @param  string  $path
     * @return SplFileInfo[]
     */
    public function directories(string $path): array;

    /**
     * Get the size of the specified directory.
     *
     * @param  string  $path
     * @return int
     */
    public function directorySize(string $path): int;

    /**
     * Make the specified directory.
     *
     * @param  string  $path
     * @return SplFileInfo
     */
    public function makeDirectory(string $path): SplFileInfo;

    /**
     * Delete the specified directory.
     *
     * @param  string  $path
     * @return bool
     */
    public function deleteDirectory(string $path): bool;

    /**
     * Rename the specified directory or file.
     *
     * @param  string  $path
     * @param  string  $oldName
     * @param  string  $newName
     * @return SplFileInfo
     */
    public function rename(string $path, string $oldName, string $newName): SplFileInfo;
}
