<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem\Adapters;

use DateInterval;
use DateTime;
use SplFileInfo;
use SplFileObject;
use Tsc\CatStorageSystem\Contracts\AdapterInterface;
use Tsc\CatStorageSystem\Filesystem\Adapters\LocalAdapter;
use Tsc\CatStorageSystem\Tests\TestCase;

class LocalAdapterTest extends TestCase
{
    protected AdapterInterface $adapter;

    protected string $path;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapter = new LocalAdapter();
        $this->path = './testing-tmp';
    }

    public function test_it_can_get_all_the_files_in_a_directory()
    {
        $directoryName = $this->faker->word;
        $path = $this->path . '/' . $directoryName;

        mkdir($path);

        $fileName = $this->faker->word . '.txt';

        $this->assertIsArray($this->adapter->files($path));
        $this->assertEmpty($this->adapter->files($path));

        touch($path . '/' . $fileName);

        $files = $this->adapter->files($path);

        $this->assertCount(1, $files);
        $this->assertSame($fileName, $files[0]->getFilename());
    }

    public function test_it_can_make_a_file()
    {
        $fileName = $this->faker->word . '.txt';
        $path = $this->path . '/' . $fileName;

        $this->assertFileDoesNotExist($path);

        $this->adapter->makeFile($this->path, $fileName);

        $this->assertFileExists($path);
    }

    public function test_it_can_update_a_file()
    {
        $fileName = $this->faker->word . '.txt';
        $path = $this->path . '/' . $fileName;

        touch($path);

        $newTime = (new DateTime())
            ->add(new DateInterval('P1W'))
            ->getTimestamp();

        $this->adapter->updateFile($path, $newTime);

        $modifiedTime = (new SplFileInfo($path))->getMTime();

        $this->assertSame($newTime, $modifiedTime);
    }

    public function test_it_can_rename_a_file()
    {
        $oldName = $this->faker->word . '.txt';
        touch($this->path . '/' . $oldName);

        $this->assertFileExists($this->path . '/' . $oldName);

        $newName = $this->faker->word . '.txt';

        $this->adapter->rename($this->path, $oldName, $newName);

        $this->assertFileExists($this->path . '/' . $newName);
        $this->assertFileDoesNotExist($this->path . '/' . $oldName);
    }

    public function test_it_can_delete_a_file()
    {
        $fileName = $this->faker->word . '.txt';
        $path = $this->path . '/' . $fileName;

        touch($path);

        $this->assertFileExists($path);

        $this->adapter->deleteFile($path);

        $this->assertFileDoesNotExist($path);
    }

    public function test_it_can_get_a_list_of_directories()
    {
        $this->assertIsArray($this->adapter->directories($this->path));
        $this->assertEmpty($this->adapter->directories($this->path));

        $directoryName = $this->faker->word;
        mkdir($this->path . '/' . $directoryName);

        $directories = $this->adapter->directories($this->path);

        $this->assertCount(1, $directories);
        $this->assertSame($directoryName, $directories[0]->getFilename());
    }

    public function test_it_can_get_the_size_of_a_directory()
    {
        $fileName = $this->faker->word . '.txt';
        $path = $this->path . '/' . $fileName;

        $size = (new SplFileObject($path, 'w'))
            ->fwrite('3 Sided Cube');

        $this->assertIsInt($this->adapter->directorySize($path));
        $this->assertSame($size, $this->adapter->directorySize($path));
    }

    public function test_it_can_make_a_directory()
    {
        $directoryName = $this->faker->word;
        $path = $this->path . '/' . $directoryName;

        $this->assertDirectoryDoesNotExist($path);

        $this->adapter->makeDirectory($path);

        $this->assertDirectoryExists($path);
    }

    public function test_it_can_rename_a_directory()
    {
        $directoryName = $this->faker->word;
        $path = $this->path . '/' . $directoryName;

        mkdir($path);

        $this->assertDirectoryExists($path);

        $newName = $this->faker->word;
        $this->adapter->rename($this->path, $directoryName, $newName);

        $this->assertDirectoryExists($this->path . '/' . $newName);
        $this->assertDirectoryDoesNotExist($path);
    }

    public function test_it_can_delete_a_directory()
    {
        $directoryName = $this->faker->word;
        $path = $this->path . '/' . $directoryName;

        mkdir($path);

        $this->assertDirectoryExists($path);

        $this->adapter->deleteDirectory($path);

        $this->assertDirectoryDoesNotExist($path);
    }
}
