# demo-php-climate-tck

Demo of Servirtium using the [Climate Data API of the World Bank](https://datahelpdesk.worldbank.org/knowledgebase/articles/902061-climate-data-api)

This demo is a work in progress following a guide (at step 1 presently): https://github.com/servirtium/README/blob/master/starting-a-new-implementation.md

## Getting Started
This repo contains PHPUnit tests, therefore you need to have phpunit installed in your local environment, a phar copy has been included in the roots of this project.

To run the tests, execute the following:

* Install dependencies: `composer update`
* Run tests: `php phpunit.phar --bootstrap vendor/autoload.php tests`