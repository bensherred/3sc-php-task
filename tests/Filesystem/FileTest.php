<?php

namespace Tsc\CatStorageSystem\Tests\Filesystem;

use Tsc\CatStorageSystem\Contracts\FileInterface;
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
}
