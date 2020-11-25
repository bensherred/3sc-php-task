<p align="center"><a href="https://3sidedcube.com" target="_blank"><img src="https://3sidedcube.com/app/themes/tsc-2018/img/footer/logo-black.png" width="400"></a></p>

### Getting Started & Requirements

* You'll need php 7.3+
* Clone this repository
* Run `composer install` from the project directory

### Cube CLI

A few helpful CLI commands have been created to show examples of how to use the filesystem. Here is a list
of the commands which are available to manipulate the cat gif images.

- `cat:create` - Create a new cat gif
- `cat:delete` - Delete an existing cat gif
- `cat:directories` - List all the directories in the images folder
- `cat:directory-size` - Get the directory size of the images folder
- `cat:file-count` - Get the number of files in the images directory
- `cat:list` - List all the cat gif images

For more information on the cli, run `php cube`.

### Tests

To run tests, run the following commands:

```
composer test
```

> Note: if you run the tests after you have manipulated the images folder, it may cause the console tests to fail.
> This is due to checking the response for some commands.
