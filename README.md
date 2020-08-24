# Trouter

A php library for creating and managing router based on the files and directory tree inside the project directory.

This is a way for creating routes and also managing the way a controler and view are called, and where should them be, who'd be or any other information about them.

Trouter has implemented a simple way for organizing the router targets according to the directory structure like next.js does.

Simple using: [php-module]

```php
$trouter = requires ('trouter');
# Configuring a public directory for matching static files
# in a 'public' directory
$trouter->define ('public directory', './public');
/**
 * Run a trouter application
 */
$trouter->run ();
```

Without php-module (Assuming that Trouter is inside a vendor folder):

```php
# Importng a Trouter Instance
$trouter = requires (__DIR__ . '/vendor/trouter/trouter.php');

# Configuring a public directory for matching static files
# in a 'public' directory
$trouter->define ('public directory', './public');
/**
 * Run a trouter application
 */
$trouter->run ();
```
