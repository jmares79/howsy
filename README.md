# Howdy 

## Objective

To perform a series of exercises in order to show proficiency in algorithms and good practices in general.


## Structure of the project

The project is based on [Symfony framework](https://symfony.com/), version 4+, and implements for 
the first exercises as a console CLI commands.

The reason behind this is to show the ability to do that without a full MVC application, just as a Linux console, an at the same time to proof that good design practices doesn't need any framework or scaffolding structure per se.

Dependency injection was used when neccesary, alongside SOLID principles with interfaces, SRP, etc so, if at any time the specific service core algorithms must be changed, it can be easily done by implementing a new service and implementing the interface method, thus inject it like the old service.

## Installation steps

Clone the repo in the web server document root (For the CLI commands) and it will be ready to use.
PHP is required to be installed.

## Usage

`php bin/console` will show the full options of Symfony console, among them there will be 2:

* `app:celebrities`: Finds the celebrity(ies) from the passed input, if any.
* `app:input-data`: Calculates the amount of knocked bottles in a thrown

So, in order to execute them should be for example: `php bin/console app:input-data <args>`

```
The celebrities command doesn't take any arguments, as they should be set inside the code.
This was done for easiness of developing, in production a validation of parameters must be added
```

The `input-data` command takes 2 arguments, the amount of bottles and a comma separated list of heights.
The input is validated and, if valid, returns the correspondent output as the exercise explains.

## Tests

Unit tests were done for the 3 services, to execute them type:

`bin/phpunit` or `bin/phpunit --filter <name-of-test>` for an individual test.


Any bug found please open an issue in github and I'll check it!
