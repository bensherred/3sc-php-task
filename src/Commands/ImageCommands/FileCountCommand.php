<?php

namespace Tsc\CatStorageSystem\Commands\ImageCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Commands\FileSystemCommand;

class FileCountCommand extends FileSystemCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('image:file-count')
            ->setDescription('Get the number of files in the images directory');
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
            $count = $this->fileSystem->getFileCount($this->rootDirectory);
        } catch (Exception $exception) {
            $output->writeln('<error>An error has occurred: ' . $exception->getMessage() . '</error>');
            return FileSystemCommand::FAILURE;
        }

        $output->writeln('<info>There are ' . $count . ' files in the images directory.</info>');

        return FileSystemCommand::SUCCESS;
    }
}
