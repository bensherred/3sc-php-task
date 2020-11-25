<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DirectorySizeCommand extends CatCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:directory-size')
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
            $output->writeln('<error>An error occurred while trying to get the directory size: ' . $exception->getMessage() . '</error>');
            return CatCommand::FAILURE;
        }

        $output->writeln('<info>The size is of the cat gif image directory is ' . $size . '</info>');

        return CatCommand::SUCCESS;
    }
}
