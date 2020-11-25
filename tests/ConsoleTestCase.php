<?php

namespace Tsc\CatStorageSystem\Tests;

use Symfony\Component\Console\Application;
use Tsc\CatStorageSystem\Commands\CatCommands\DirectoryCommand;
use Tsc\CatStorageSystem\Commands\CatCommands\ListCommand;
use Tsc\CatStorageSystem\Commands\HollaCommand;

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
            new DirectoryCommand(),
            new HollaCommand(),
            new ListCommand(),
        ]);
    }
}
