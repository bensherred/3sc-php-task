<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends CatCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:list')
            ->setDescription('List all the cat gif images');
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
            $files = $this->fileSystem->getFiles($this->rootDirectory);
        } catch (Exception $exception) {
            $output->writeln('<error>An error has occurred: ' . $exception->getMessage() . '</error>');
            return CatCommand::FAILURE;
        }

        $output->writeln('<info>Here are the names of your awesome cat GIF\'s:</info>');

        foreach ($files as $file) {
            $output->writeln($file->getName());
        }

        return CatCommand::SUCCESS;
    }
}
