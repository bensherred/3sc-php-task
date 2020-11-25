<?php

namespace Tsc\CatStorageSystem\Filesystem;

use DateTimeInterface;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Contracts\FileInterface;

class File implements FileInterface
{
    /**
     * The name of the file.
     *
     * @var string
     */
    protected string $name;

    /**
     * The size of the file.
     *
     * @var int
     */
    protected int $size;

    /**
     * The date and time the file was created.
     *
     * @var DateTimeInterface
     */
    protected DateTimeInterface $createdTime;

    /**
     * The date and time the file was last modified.
     *
     * @var DateTimeInterface
     */
    protected DateTimeInterface $modifiedTime;

    /**
     * The files parent directory.
     *
     * @var DirectoryInterface
     */
    protected DirectoryInterface $parentDirectory;

    /**
     * Get the name of the file.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name of the file.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): FileInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the size of the file.
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param  int  $size
     * @return $this
     */
    public function setSize(int $size): FileInterface
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the date and time the file was created.
     *
     * @return DateTimeInterface
     */
    public function getCreatedTime(): DateTimeInterface
    {
        return $this->createdTime;
    }

    /**
     * Set the date and time the file was created.
     *
     * @param  DateTimeInterface  $created
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $created): FileInterface
    {
        $this->createdTime = $created;

        return $this;
    }

    /**
     * Get the date and time the file was last modified.
     *
     * @return DateTimeInterface
     */
    public function getModifiedTime(): DateTimeInterface
    {
        return $this->modifiedTime;
    }

    /**
     * Set the date and time the file was last modified.
     *
     * @param  DateTimeInterface  $modified
     * @return $this
     */
    public function setModifiedTime(DateTimeInterface $modified): FileInterface
    {
        $this->modifiedTime = $modified;

        return $this;
    }

    /**
     * Get the parent directory of the file.
     *
     * @return DirectoryInterface
     */
    public function getParentDirectory(): DirectoryInterface
    {
        return $this->parentDirectory;
    }

    /**
     * Set the parent directory for the file.
     *
     * @param  DirectoryInterface  $parent
     * @return $this
     */
    public function setParentDirectory(DirectoryInterface $parent): FileInterface
    {
        $this->parentDirectory = $parent;

        return $this;
    }

    /**
     * Get the path to the folder.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->parentDirectory->getPath() . '/' . $this->parentDirectory->getName();
    }
}
