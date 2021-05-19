
### *AMOUNT PAY*

System developed as proof of employment opportunity for the IOTEC company.

The solution was developed in PHP and is based on calculating the amount to be paid to an employee depending on the days and hours he has worked.

Employee information will be entered in a .txt file with designated rates, the amount to be paid will be calculated taking into account whether the days worked are weekdays or weekends

### Requirements to run the system

To run the system locally you need:

1. PHP.
2. Composer [Descargar Composer](https://getcomposer.org/download/)

### Installation

1. Clone the project in the xampp htdocs folder. `https://github.com/Jorge1308/Iiotec_prueba_Jorge_Silva.git`
2. Run the `composer install` command from the console to install the PHP
3. We put in the browser the address of the folder in which the project is located. `http://localhost/Iiotec_prueba_Jorge_Silva/App/View/`
4. O se puede ejecutar desde consola en el fichero del proyecto carpeta `App/View/index.php` 

### Architecture

Due to the simplicity of the solution, an architecture as such cannot be evidenced, but a similarity with the MVC architecture can be established, especially in the order of the files that make up the project.

The index.php file as a view.

The amounToPay.php file as a controller.

The system does not require a database so the information is obtained in a method of the class of the amounTopay.php file

### Used dependencies

The dependency used was PHPUnit for system testing, installed through composer.

[Documentation PhpUnit](https://phpunit.de/)

PHPUnit is an instance of the xUnit architecture for unit testing frameworks.

For its installation the command is executed `composer require --dev phpunit/phpunit ^9`

And to run the tests the command `./vendor/bin/phpunit ./CalculateMountTest.php ./CalculateMountTest`

The following is one of the tests performed on the system

php

 `/** @test **/
 public function check_if_file_exists()
{
    $this->assertFileExists('./App/Datos.txt');
}`




### Approach

It is an object-oriented programming, with static attributes and methods.

During the development of the system, it is intended to solve the problem in a simple but efficient way, validating the information and with due testing.

A simple logic in a way that is easy to understand and at the same time maintains a structure that allows the scalability of the solution
