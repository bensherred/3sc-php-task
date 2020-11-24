<?php

namespace Tsc\CatStorageSystem\Contracts;

use DateTime;
use DateTimeInterface;

interface FileInterface
{
    /**
     * Get the name of the file.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set the name of the file.
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * Get the size of the file.
     *
     * @return int
     */
    public function getSize(): int;

    /**
     * @param  int  $size
     * @return $this
     */
    public function setSize(int $size): self;

    /**
     * Get the date and time the file was created.
     *
     * @return DateTime
     */
    public function getCreatedTime(): DateTime;

    /**
     * Set the date and time the file was created.
     *
     * @param  DateTimeInterface  $created
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $created): self;

    /**
     * Get the date and time the file was last modified.
     *
     * @return DateTimeInterface
     */
    public function getModifiedTime(): DateTimeInterface;

    /**
     * Set the date and time the file was last modified.
     *
     * @param  DateTimeInterface  $modified
     * @return $this
     */
    public function setModifiedTime(DateTimeInterface $modified): self;

    /**
     * Get the parent directory of the file.
     *
     * @return DirectoryInterface
     */
    public function getParentDirectory(): DirectoryInterface;

    /**
     * Set the parent directory for the file.
     *
     * @param  DirectoryInterface  $parent
     * @return $this
     */
    public function setParentDirectory(DirectoryInterface $parent): self;

    /**
     * Get the path to the folder.
     *
     * @return string
     */
    public function getPath(): string;
}
