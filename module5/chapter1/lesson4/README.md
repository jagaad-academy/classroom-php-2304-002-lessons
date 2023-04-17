# PHP5.C1.L4 App Chapter Review

Application developed to review the topics of the current chapter about Docker & Docker Compose, Standard PHP Library, and Web API Security.

## Requirements

- [Docker](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Installation

- Start up the containers: `docker-compose up`
- Create the dot env file: `cp .env.example .env`
- Install the PHP deps using Composer inside the container: `docker exec -it phpcoursem5.php-fpm composer install`
- Run the db creation script: `docker exec -it phpcoursem5.php-fpm php cli/create-db.php` 

## Database Commands

- To connect to the container DB: `docker exec -it phpcoursem5.mariadb mysql -u root -p root`
- To show the databases: `show databases;`
- To access the `lesson4` database: `use lesson4;`
- To show the tables: `show tables;`
- To see the table structure: `describe people;`


## Extra Commands

- Stop the containers: `docker-compose stop`
- Stop and remove the containers: `docker-compose down`