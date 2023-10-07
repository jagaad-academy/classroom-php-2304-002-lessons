<h1 align="center">Payment API</h1>

<p align="center">
This is a simple payment API created for the Jagaad PHP Course <b>classroom-php-2304-002</b>. This application aims to cover some module 5 topics, mainly those related to the last chapter about CI/CD and deploying PHP applications.
</p>

[![Continuous Integration Module5](https://github.com/h-shvedko/paymentAPI/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/h-shvedko/paymentAPI/actions/workflows/continuous-integration.yml)
![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/h-shvedko/paymentAPI/continuous-integration.yml)

## Installation

This app can run using the typical XAMPP configuration; ensure you have the correct PHP version. Or you can also use Docker Compose to start all the required services.

### Here's how we run it using XAMPP:

1. Ensure you have XAMPP and Composer installed.
2. Create the database `project_manager`.
3. Install the PHP dependencies.
   ````
   composer install
   ````
4. Create the tables.
   ```
   php vendor/bin/doctrine orm:schema-tool:create 
   ````
5. Run the local web server.
   ```
   php -S localhost:8889 -t public/
   ````

### Here's with Docker:

1. Ensure the `.env` contains the same MySQL password that the one set on [docker-compose.yml](./docker-compose.yml).
2. Run the Docker containers.
   ````
   docker-compose up -d
   ````
3. Create the tables.
   ```
   docker exec -it php-course.php-fpm php vendor/bin/doctrine orm:schema-tool:create 
   ````
4. Go to http://localhost:8000

## Quality Tools

Note: If you are using only the Docker containers, remember to include the prefix `docker exec -it php-course.php-fpm ` to all the PHP commands, similar to one above.

- Run the unit tests with PHPUnit
  ```
  php vendor/bin/phpunit test/ --colors
  ```
- Run the static analysis with PHPStan
  ```
  php vendor/bin/phpstan
  ```
- Check the code style with PHPCodeSniffer
  ```
  php vendor/bin/phpcs vendor/bin/phpcs src/ --standard=psr12
  ```
- Fix the code style with PHPCodeSniffer
  ```
  php vendor/bin/phpcbf vendor/bin/phpcs src/ --standard=psr12
  ```
