<?php

namespace Tsc\CatStorageSystem\Filesystem;

use DateTimeInterface;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;

class Directory implements DirectoryInterface
{
    /**
     * Get the name of the directory.
     *
     * @return string
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    /**
     * Set the name of the folder.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): DirectoryInterface
    {
        // TODO: Implement setName() method.
    }

    /**
     * Get the date and time the folder was created.
     *
     * @return DateTimeInterface
     */
    public function getCreatedTime(): DateTimeInterface
    {
        // TODO: Implement getCreatedTime() method.
    }

    /**
     * Set the date and time the directory was created.
     *
     * @param  DateTimeInterface  $created
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $created): DirectoryInterface
    {
        // TODO: Implement setCreatedTime() method.
    }

    /**
     * Get the path of the directory.
     *
     * @return string
     */
    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }

    /**
     * Set the path of the directory.
     *
     * @param  string  $path
     * @return $this
     */
    public function setPath(string $path): DirectoryInterface
    {
        // TODO: Implement setPath() method.
    }
}
