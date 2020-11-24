<?php

namespace Tsc\CatStorageSystem\Tests\Console;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tsc\CatStorageSystem\Commands\HollaCommand;

class HollaCommandTest extends TestCase
{
    public function test_holla_command_outputs_message()
    {
        // Register the command
        $app = new Application();
        $app->add(new HollaCommand());

        // Find the holla command
        $command = $app->find('holla');

        // Execute the command and get the output
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);
        $output = $commandTester->getDisplay();

        // Assert the output of the command
        $this->assertStringContainsString('3 Sided Cube, making tech for good!', $output);
    }
}