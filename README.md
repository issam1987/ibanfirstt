# ibanfirstt
Symfony Demo Application
The "Symfony Demo Application" is a reference application created to show how to develop applications following the Symfony Best Practices.

Requirements
PHP 7.2.9 or higher;
PDO-SQLite PHP extension enabled;
and the usual Symfony application requirements.
Installation
Download Symfony to install the symfony binary on your computer and run this command:

$ symfony new --demo my_project
Alternatively, you can use Composer:

$ composer create-project symfony/symfony-demo my_project
Usage
There's no need to configure anything to run the application. If you have installed Symfony, run this command and access the application in your browser at the given URL (https://localhost:8000 by default):

$ cd my_project/
$ symfony serve
If you don't have the Symfony binary installed, run php -S localhost:8000 -t public/ to use the built-in PHP web server or configure a web server like Nginx or Apache to run the application.

Tests
Execute this command to run tests:

$ cd my_project/
$ ./bin/phpunit
