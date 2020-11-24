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
        $name = self::faker()->word;

        return (new Directory())
            ->setName($name)
            ->setCreatedTime(self::faker()->dateTime)
            ->setPath('./testing-tmp/' . $name);
    }
}
