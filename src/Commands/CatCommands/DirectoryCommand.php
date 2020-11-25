<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DirectoryCommand extends CatCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:directories')
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
        $directories = $this->fileSystem->getDirectories($this->rootDirectory);

        $output->writeln('<info>Here are the sub directories in the images directory:</info>');

        foreach ($directories as $directory) {
            $output->writeln($directory->getName());
        }

        return CatCommand::SUCCESS;
    }
}
