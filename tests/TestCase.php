<?php

namespace Tsc\CatStorageSystem\Tests;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * An instance of faker to use for mocking.
     *
     * @var Generator
     */
    protected Generator $faker;

    /**
     * Setup the test suite and create a faker instance.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }
}
