<?php

namespace Tsc\CatStorageSystem\Tests\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tsc\CatStorageSystem\Commands\ListCatCommand;
use Tsc\CatStorageSystem\Tests\TestCase;

class ListCatCommandTest extends TestCase
{
    public function test_a_user_can_get_a_list_of_the_cat_gifs()
    {
        // Register the command
        $app = new Application();
        $app->add(new ListCatCommand());

        // Find the cat:list command
        $command = $app->find('cat:list');

        // Execute the command and get the output
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);
        $output = $commandTester->getDisplay();

        // Assert the output of the command
        $this->assertStringContainsString('cat_1.gif', $output);
        $this->assertStringContainsString('cat_2.gif', $output);
        $this->assertStringContainsString('cat_3.gif', $output);
    }
}
