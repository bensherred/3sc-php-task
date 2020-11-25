<?php

namespace Tsc\CatStorageSystem\Contracts;

interface FileSystemInterface
{
    /**
     * Create the specified file in the specified directory.
     *
     * @param  FileInterface  $file
     * @param  DirectoryInterface  $parent
     * @return FileInterface
     */
    public function createFile(FileInterface $file, DirectoryInterface $parent): FileInterface;

    /**
     * Update the specified file.
     *
     * @param  FileInterface  $file
     * @return FileInterface
     */
    public function updateFile(FileInterface $file): FileInterface;

    /**
     * Rename the specified file.
     *
     * @param  FileInterface  $file
     * @param  string  $newName
     * @return FileInterface
     */
    public function renameFile(FileInterface $file, string $newName): FileInterface;

    /**
     * Delete the specified file.
     *
     * @param  FileInterface  $file
     * @return bool
     */
    public function deleteFile(FileInterface $file): bool;

    /**
     * Create the root directory.
     *
     * @param  DirectoryInterface  $directory
     * @return DirectoryInterface
     */
    public function createRootDirectory(DirectoryInterface $directory): DirectoryInterface;

    /**
     * Create the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @param  DirectoryInterface  $parent
     * @return DirectoryInterface
     */
    public function createDirectory(DirectoryInterface $directory, DirectoryInterface $parent): DirectoryInterface;

    /**
     * Delete the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return bool
     */
    public function deleteDirectory(DirectoryInterface $directory): bool;

    /**
     * Rename the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @param  string  $newName
     * @return DirectoryInterface
     */
    public function renameDirectory(DirectoryInterface $directory, string $newName): DirectoryInterface;

    /**
     * Get the number of directories in the specified folder.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getDirectoryCount(DirectoryInterface $directory): int;

    /**
     * Get the number of files in the specified folder.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getFileCount(DirectoryInterface $directory): int;

    /**
     * Get the size of the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return int
     */
    public function getDirectorySize(DirectoryInterface $directory): int;

    /**
     * Get the directories within the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return DirectoryInterface[]
     */
    public function getDirectories(DirectoryInterface $directory): array;

    /**
     * Get the files within the specified directory.
     *
     * @param  DirectoryInterface  $directory
     * @return FileInterface[]
     */
    public function getFiles(DirectoryInterface $directory): array;
}
