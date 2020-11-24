<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem;

use DateTimeInterface;
use Tsc\CatStorageSystem\Contracts\DirectoryInterface;
use Tsc\CatStorageSystem\Contracts\FileInterface;
use Tsc\CatStorageSystem\Factories\DirectoryFactory;
use Tsc\CatStorageSystem\Filesystem\File;
use Tsc\CatStorageSystem\Tests\TestCase;

class FileTest extends TestCase
{
    /**
     * An instance of File to use within the testsuite.
     *
     * @var File
     */
    protected File $file;

    /**
     * Configure the test before it's run. This method is called
     * before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->file = new File();
    }

    public function test_it_implements_the_file_interface()
    {
        $file = $this->getMockBuilder(File::class)->getMock();
        $this->assertInstanceOf(FileInterface::class, $file);
    }

    public function test_it_can_set_and_get_the_name()
    {
        $name = "{$this->faker->word}.{$this->faker->fileExtension}";

        $this->file->setName($name);

        $this->assertIsString($this->file->getName());
        $this->assertSame($name, $this->file->getName());
    }

    public function test_it_can_set_and_get_the_size()
    {
        $this->file->setSize($size = $this->faker->numberBetween(1, 1024));

        $this->assertIsInt($this->file->getSize());
        $this->assertSame($size, $this->file->getSize());
    }

    public function test_it_can_set_and_get_the_created_time()
    {
        $this->file->setCreatedTime($createdTime = $this->faker->dateTime);

        $this->assertInstanceOf(DateTimeInterface::class, $this->file->getCreatedTime());
        $this->assertSame($createdTime, $this->file->getCreatedTime());
    }

    public function test_it_can_set_and_get_the_modified_time()
    {
        $this->file->setModifiedTime($modifiedTime = $this->faker->dateTime);

        $this->assertInstanceOf(DateTimeInterface::class, $this->file->getModifiedTime());
        $this->assertSame($modifiedTime, $this->file->getModifiedTime());
    }

    public function test_it_can_set_and_get_the_parent_directory()
    {
        $this->file->setParentDirectory($directory = DirectoryFactory::create());

        $this->assertInstanceOf(DirectoryInterface::class, $this->file->getParentDirectory());
        $this->assertSame($directory, $this->file->getParentDirectory());
    }

    public function test_it_can_get_the_path()
    {
        $fileName = "{$this->faker->word}.{$this->faker->fileExtension}";
        $directory = DirectoryFactory::create();

        $this->file->setName($fileName)->setParentDirectory($directory);

        $path = $directory->getPath() . '/' . $fileName;

        $this->assertIsString($this->file->getPath());
        $this->assertSame($path, $this->file->getPath());
    }
}
