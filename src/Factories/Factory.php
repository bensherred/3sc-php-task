<?php

namespace Tsc\CatStorageSystem\Factories;

use Faker\Factory as FakerFactory;
use Faker\Generator;

abstract class Factory
{
    /**
     * Create a new factory instance.
     *
     * @return mixed
     */
    abstract public static function create();

    /**
     * Create a new factory instance.
     *
     * @return Generator
     */
    protected static function faker(): Generator
    {
        return FakerFactory::create();
    }
}
