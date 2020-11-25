<?php

namespace Tsc\CatStorageSystem\Tests;

use Symfony\Component\Console\Application;
use Tsc\CatStorageSystem\Commands\HollaCommand;
use Tsc\CatStorageSystem\Commands\ListCatCommand;

class ConsoleTestCase extends TestCase
{
    /**
     * The instance of the console application.
     *
     * @var Application
     */
    protected Application $app;

    /**
     * Register all the console commands.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app = new Application();

        // Register the commands
        $this->app->addCommands([
            new HollaCommand(),
            new ListCatCommand(),
        ]);
    }
}
