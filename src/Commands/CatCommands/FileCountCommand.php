<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FileCountCommand extends CatCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:file-count')
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
            $output->writeln('<error>An error occurred while trying to get the file count: ' . $exception->getMessage() . '</error>');
            return CatCommand::FAILURE;
        }

        $output->writeln('<info>There are ' . $count . ' cat gif images.</info>');

        return CatCommand::SUCCESS;
    }
}
