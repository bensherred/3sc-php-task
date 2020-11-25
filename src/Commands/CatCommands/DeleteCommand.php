<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Filesystem\File;

class DeleteCommand extends CatCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:delete')
            ->setDescription('Create a new cat gif')
            ->addArgument('name', InputOption::VALUE_REQUIRED, 'The name of the cat gif you wish to delete');
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
            $output->writeln('<error>Please enter the name of the cat gif you wish to delete!</error>');
            return CatCommand::FAILURE;
        }

        $file = (new File())
            ->setName($name . '.gif')
            ->setParentDirectory($this->rootDirectory);

        $this->fileSystem->deleteFile($file);

        $output->writeln('<info>Your cat gif has been deleted!</info>');

        return CatCommand::SUCCESS;
    }
}
