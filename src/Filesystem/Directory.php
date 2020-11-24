<?php

namespace Tsc\CatStorageSystem\Filesystem;

use DateTimeInterface;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;

class Directory implements DirectoryInterface
{
    /**
     * The name of the directory.
     *
     * @var string
     */
    protected string $name;

    /**
     * The date and time the directory was created.
     *
     * @var DateTimeInterface
     */
    protected DateTimeInterface $createdTime;

    /**
     * The path of the directory.
     *
     * @var string
     */
    protected string $path;

    /**
     * Get the name of the directory.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name of the folder.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): DirectoryInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the date and time the folder was created.
     *
     * @return DateTimeInterface
     */
    public function getCreatedTime(): DateTimeInterface
    {
        return $this->createdTime;
    }

    /**
     * Set the date and time the directory was created.
     *
     * @param  DateTimeInterface  $created
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $created): DirectoryInterface
    {
        $this->createdTime = $created;

        return $this;
    }

    /**
     * Get the path of the directory.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set the path of the directory.
     *
     * @param  string  $path
     * @return $this
     */
    public function setPath(string $path): DirectoryInterface
    {
        $this->path = $path;

        return $this;
    }
}
