# Trouter

A php library for creating and managing router based on the files and directory tree inside the project directory.

This is a way for creating routes and also managing the way a controler and view are called, and where should them be, who'd be or any other information about them.

Trouter has implemented a simple way for organizing the router targets according to the directory structure like next.js does.

It, has not got [by default] a MVC structure assuming that router is the core of Trouter functionalities and objetives; but it may be extended with with any created module that should be added to a project to do this and Trouter will manage it, giving to it the possibility to manage part or parts of the application acording to the given <a href="https://permitions.github.io" target="_blank">permissions</a> to it.

## Using

Using Trouter is easy such as creating a simple and static website, because it [b default] does not need to map another list of routes beyond the system directory structure where it is running. `But it should also be extended`.

### Width php-module

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

### Without php-module
##### [Assuming that Trouter is inside a vendor folder]

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

## Running the Application

### Using a Command Line Interface

The Trouter cli is going to available soon. For a while [by default] it provides a `dev` file in the site directory that should be used to start the application up by using the Prompt Command Line or CMD.

- Open the command prompt (cmd)
- Go to the application directory (where trouter directory is)
- Run [the following commands]:

```bash
cd site
php dev
```

Or just,

```bash
php site/dev
```

Then, run a broswer at: http://localhost:8000 to view the application.



### Using the server document folder (www or htdocs)

If using the Trouter application and running it without using a command line interface, it should be an alternative to do that to host it in the server documents folder; to run Touter by this way its necessary to have a `.htaccess` file in the application root directory (If the trouter root directory does not contain it, create and edit it [as shown bellow]).

#### Prerequisites for using HTACCESS

- Make sure you have possibility to use the friendly URLs in your server [commonly provided by a `mod_rewrite` module]

Having the .htaccess file in the root directory, you should edit it as done bellow:

```
RewriteEngine On

RewriteRule ^(.*)$ site/server.php
```

Then, run a broswer at: http://localhost/ProjectName to view the application.


## Trouter Application Directory Structure

You may use the Trouter project directory as you application's; you may use the `site` directory as your application's creating its files inside the `site/app` directory (name should be changed); Inside this directory you should create your pages in the `site/app/pages`.

Creating an `index.php` file inside the pages directory you should access it at: `localhost:8000/`, and so on (as seen in the table bellow):


View File Path | Route Path | Route URL
----------|-------------|--------------
home/index.php | /home | localhost:8000/home
home.php | /home | localhost:8000/home
about/index.php | /about | localhost:8000/about
about.php | /about | localhost:8000/about


