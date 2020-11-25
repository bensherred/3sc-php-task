<?php

namespace Tsc\CatStorageSystem\Commands\ImageCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Commands\FileSystemCommand;

class DirectoryCommand extends FileSystemCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('image:directories')
            ->setDescription('List all the directories in the images folder');
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
        try {
            $directories = $this->fileSystem->getDirectories($this->rootDirectory);
        } catch (Exception $exception) {
            $output->writeln('<error>An error has occurred: ' . $exception->getMessage() . '</error>');
            return FileSystemCommand::FAILURE;
        }

        $output->writeln('<info>Here are the sub directories in the images directory:</info>');

        foreach ($directories as $directory) {
            $output->writeln($directory->getName());
        }

        return FileSystemCommand::SUCCESS;
    }
}
