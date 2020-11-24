<?php

namespace Tsc\CatStorageSystem\Filesystem;

use DateTime;
use DateTimeInterface;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Contracts\FileInterface;

class File implements FileInterface
{
    /**
     * Get the name of the file.
     *
     * @return string
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    /**
     * Set the name of the file.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): FileInterface
    {
        // TODO: Implement setName() method.
    }

    /**
     * Get the size of the file.
     *
     * @return int
     */
    public function getSize(): int
    {
        // TODO: Implement getSize() method.
    }

    /**
     * @param  int  $size
     * @return $this
     */
    public function setSize(int $size): FileInterface
    {
        // TODO: Implement setSize() method.
    }

    /**
     * Get the date and time the file was created.
     *
     * @return DateTime
     */
    public function getCreatedTime(): DateTime
    {
        // TODO: Implement getCreatedTime() method.
    }

    /**
     * Set the date and time the file was created.
     *
     * @param  DateTimeInterface  $created
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $created): FileInterface
    {
        // TODO: Implement setCreatedTime() method.
    }

    /**
     * Get the date and time the file was last modified.
     *
     * @return DateTimeInterface
     */
    public function getModifiedTime(): DateTimeInterface
    {
        // TODO: Implement getModifiedTime() method.
    }

    /**
     * Set the date and time the file was last modified.
     *
     * @param  DateTimeInterface  $modified
     * @return $this
     */
    public function setModifiedTime(DateTimeInterface $modified): FileInterface
    {
        // TODO: Implement setModifiedTime() method.
    }

    /**
     * Get the parent directory of the file.
     *
     * @return DirectoryInterface
     */
    public function getParentDirectory(): DirectoryInterface
    {
        // TODO: Implement getParentDirectory() method.
    }

    /**
     * Set the parent directory for the file.
     *
     * @param  DirectoryInterface  $parent
     * @return $this
     */
    public function setParentDirectory(DirectoryInterface $parent): FileInterface
    {
        // TODO: Implement setParentDirectory() method.
    }

    /**
     * Get the path to the folder.
     *
     * @return string
     */
    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }
}
