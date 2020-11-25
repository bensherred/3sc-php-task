<?php

namespace Tsc\CatStorageSystem\Factories;

use Tsc\CatStorageSystem\Filesystem\File;

class FileFactory extends Factory
{
    /**
     * Create a new factory instance.
     *
     * @return File
     */
    public static function create(): File
    {
        return (new File())
            ->setName(self::faker()->word . '.' . self::faker()->fileExtension)
            ->setSize(self::faker()->numberBetween(1, 1024))
            ->setCreatedTime(self::faker()->dateTime)
            ->setModifiedTime(self::faker()->dateTime)
            ->setParentDirectory(DirectoryFactory::create());
    }
}
