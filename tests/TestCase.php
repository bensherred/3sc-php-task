<?php

namespace Tsc\CatStorageSystem\Tests;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase as BaseTestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

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

    /**
     * Clear the testing-tmp folder after the test has run.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        // Remove all the tmp testing folders and files
        $directories = new RecursiveDirectoryIterator('./testing-tmp');
        $files = new RecursiveIteratorIterator($directories, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file) {
            // Ignore dotfiles i.e. gitignore
            if (substr($file->getFilename(), 0, 1) === ".") {
                continue;
            }

            $file->isDir() ? rmdir($file) : unlink($file);
        }
    }
}
