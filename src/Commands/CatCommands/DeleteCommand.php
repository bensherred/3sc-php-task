<?php

namespace Tsc\CatStorageSystem\Commands\CatCommands;

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tsc\CatStorageSystem\Commands\FileSystemCommand;
use Tsc\CatStorageSystem\Filesystem\File;

class DeleteCommand extends FileSystemCommand
{
    /**
     * Configure the console command
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('cat:delete')
            ->setDescription('Delete an existing cat gif')
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
            return FileSystemCommand::FAILURE;
        }

        $file = (new File())
            ->setName($name . '.gif')
            ->setParentDirectory($this->rootDirectory);

        try {
            $this->fileSystem->deleteFile($file);
        } catch (Exception $exception) {
            $output->writeln('<error>An error has occurred: ' . $exception->getMessage() . '</error>');
            return FileSystemCommand::FAILURE;
        }

        $output->writeln('<info>Your cat gif has been deleted!</info>');

        return FileSystemCommand::SUCCESS;
    }
}
