<?php

namespace Tsc\CatStorageSystem\Contracts;

use DateTimeInterface;

interface DirectoryInterface
{
    /**
     * Get the name of the directory.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set the name of the folder.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * Get the date and time the folder was created.
     *
     * @return DateTimeInterface
     */
    public function getCreatedTime(): DateTimeInterface;

    /**
     * Set the date and time the directory was created.
     *
     * @param  DateTimeInterface  $created
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $created): self;

    /**
     * Get the path of the directory.
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Set the path of the directory.
     *
     * @param  string  $path
     * @return $this
     */
    public function setPath(string $path): self;
}
