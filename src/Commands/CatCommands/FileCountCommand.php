<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

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
        $count = $this->fileSystem->getFileCount($this->rootDirectory);

        $output->writeln('<info>There are ' . $count . ' cat gif images.</info>');

        return CatCommand::SUCCESS;
    }
}
