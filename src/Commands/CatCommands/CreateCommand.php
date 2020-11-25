<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Filesystem\File;

class CreateCommand extends CatCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:create')
            ->setDescription('Create a new cat gif')
            ->addArgument('name', InputOption::VALUE_REQUIRED, 'The name of the cat gif');
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
        $name = $input->getArgument('name');

        if (!$name) {
            $output->writeln('<error>Please enter a name for the new cat gif!</error>');
            return CatCommand::FAILURE;
        }

        $file = (new File())
            ->setName($name . '.gif');

        $this->fileSystem->createFile($file, $this->rootDirectory);

        $output->writeln('<info>Your new cat gif has been created, go check it out!</info>');

        return CatCommand::SUCCESS;
    }
}
