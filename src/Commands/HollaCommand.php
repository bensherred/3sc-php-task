<?php

namespace Tsc\CatStorageSystem\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HollaCommand extends Command
{
    /**
     * The name of the command.
     *
     * @var string
     */
    protected static $defaultName = 'holla';

    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Make tech for good');
    }

    /**
     * Execute the console command.
     *
     * @param  InputInterface  $input
     * @param  OutputInterface  $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>3 Sided Cube, making tech for good! Find out more by visiting 3sidedcube.com</info>');

        return Command::SUCCESS;
    }
}
