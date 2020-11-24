<?php

namespace Tsc\CatStorageSystem\Factories;

use Tsc\CatStorageSystem\Filesystem\Directory;

class DirectoryFactory extends Factory
{
    /**
     * Create a new factory instance.
     *
     * @return Directory
     */
    public static function create(): Directory
    {
        return (new Directory())
            ->setName(self::faker()->word)
            ->setCreatedTime(self::faker()->dateTime)
            ->setPath('./' . self::faker()->word);
    }
}
