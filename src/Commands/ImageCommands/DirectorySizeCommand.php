<?php

namespace Tsc\CatStorageSystem\Commands\ImageCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Commands\FileSystemCommand;

class DirectorySizeCommand extends FileSystemCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('image:directory-size')
            ->setDescription('Get the directory size of the images folder');
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
            $size = $this->fileSystem->getFileCount($this->rootDirectory);
        } catch (Exception $exception) {
            $output->writeln('<error>An error has occurred: ' . $exception->getMessage() . '</error>');
            return FileSystemCommand::FAILURE;
        }

        $output->writeln('<info>The size is of the images directory is ' . $size . '.</info>');

        return FileSystemCommand::SUCCESS;
    }
}
