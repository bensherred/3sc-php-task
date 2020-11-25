<?php

namespace Tsc\CatStorageSystem\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListCatCommand extends CatCommand
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
        $files = $this->fileSystem->getFiles($this->rootDirectory);

        $output->writeln('<info>Here are the names of your awesome cat GIF\'s:</info>');

        foreach ($files as $file) {
            $output->writeln($file->getName());
        }

        return CatCommand::SUCCESS;
    }
}
