<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Commands\FileSystemCommand;
use Tsc\CatStorageSystem\Filesystem\File;

class CreateCommand extends FileSystemCommand
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
            return FileSystemCommand::FAILURE;
        }

        $file = (new File())
            ->setName($name . '.gif');

        try {
            $this->fileSystem->createFile($file, $this->rootDirectory);
        } catch (Exception $exception) {
            $output->writeln('<error>An error has occurred: ' . $exception->getMessage() . '</error>');
            return FileSystemCommand::FAILURE;
        }

        $output->writeln('<info>Your new cat gif has been created, go check it out!</info>');

        return FileSystemCommand::SUCCESS;
    }
}
