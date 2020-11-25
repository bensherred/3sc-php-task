<?php

namespace Tsc\CatStorageSystem\Tests\Console;

use Symfony\Component\Console\Tester\CommandTester;
use Tsc\CatStorageSystem\Tests\ConsoleTestCase;

class HollaCommandTest extends ConsoleTestCase
{
    public function test_holla_command_outputs_message()
    {
        // Find the holla command
        $command = $this->app->find('holla');

        // Execute the command and get the output
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);
        $output = $commandTester->getDisplay();

        // Assert the output of the command
        $this->assertStringContainsString('3 Sided Cube, making tech for good!', $output);
    }
}
