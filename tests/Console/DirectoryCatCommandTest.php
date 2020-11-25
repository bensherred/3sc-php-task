<?php

namespace Tsc\CatStorageSystem\Tests\Console;

use Symfony\Component\Console\Tester\CommandTester;
use Tsc\CatStorageSystem\Tests\ConsoleTestCase;

class DirectoryCatCommandTest extends ConsoleTestCase
{
    public function test_a_user_can_get_a_list_of_the_cat_gifs()
    {
        // Find the cat:list command
        $command = $this->app->find('cat:directories');

        // Execute the command and get the output
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);
        $output = $commandTester->getDisplay();

        // Assert the output of the command
        $this->assertStringContainsString('my favourite cat gif', $output);
    }
}
