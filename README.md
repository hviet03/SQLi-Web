# Simple Web App

## Introduction

**This is an extremely vulnerable application. Please do not deploy in production or host it on the Internet. You are responsible for this application and what you do with it.**

This is a simple PHP application with multiple pages to demonstrate and learn SQL Injection.

The PHP code is extremely primitive but clearly demonstrates the vulnerability and can be used to teach the various kinds of SQL injection in a hands-on class.

## Pre-requisites

- `docker` 
- `docker-compose`

## Setup
- Run `docker-compose up` in the root of the repo where the `docker-compose.yml` file is present
- Go to `http://127.0.0.1:8000/resetdb.php` to create the database and tables within the application.

## DB variables

If you wish to change the password of the root user when starting the containers, update the following files:
* edit the value of `MYSQL_ROOT_PASSWORD` in `docker-compose.yml` 
* edit the value of `$DBPASS` in `db_config.php`
* edit the value of `$DBPASS` in `resetdb.php`


## Reset DB

To reset the database, navigate to `/resetdb.php` 
