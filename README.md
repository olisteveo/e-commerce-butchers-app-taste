<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

----

## Run Taste Application

Running the Taste application requires certain **prerequisites**, follow the **getting started** steps to set up the required environment and Taste application. 


## Prerequisites

- ***XAMPP*** 

    - ***A***pache Web Server
    - ***M***ysql DB Server
    - ***P***HP

- ***Composer*** 
- ***Node.js*** 
    - for installation of npm (node package manager)

## Getting Started

Clone the repository and setup the local environment.

1. ***Clone*** the Taste repo to anywhere

    This creates a subfolder by default named ***`taste`***

    ```bash
    git clone git@bitbucket.org:Olisteveo/taste.git
    ```

1. ***Copy*** `env.example` to `.env`

    ```bash
    cd taste
    cp env.example .env
    ```

    - ***Environment*** Dependencies

        - Populated environment setup is dependent on setting `APP_ENV=local` in ***.env*** file.

        - Composer & NPM dependencies are also installed per env setup.

        - Test data is also seeded when `APP_ENV=local`.
    
1. ***Install*** PHP Composer requirements

    This installs the composer requirements for the project

    ```bash
    composer install
    ```

1. [***Install*** Node.js requirements](https://nodejs.org/en/download)

    ```bash
    npm install
    ```

1. ***npm*** run development

    This builds the development environment - alternatively ```npm run``` for production env.

    ```bash
    npm run dev
    ```

1. ***Run*** Migrations

    Create `taste` ***Database*** and all the required tables and relationships for the app.

    ```bash
    php artisan migrate
    ```

1. ***Seed*** Database with Data

    This populates the database with test/dummy data and some predefined application data

    ```bash
    php artisan db:seed
    ```

1. ***Serve*** Application

     ***Serve*** `taste` application on local host.

    ```bash
    php artisan serve
    ```

----

## Initial Functional Requirements

-	A secure password protected role based access control system to the site.
-   To implement suitable client side and server side validation.
-	To allow content formatting with Regular Expressions
-	To implement suitable front-end technologies including JQuery and Google APIs.
-	Administrator Control
    - Recipe categories create, update, & delete
    - Page content manage

## Additional could have features
- Make the self-registered users sign up with a password with rights to:
    - Create, edit & delete recipes
    - Update & delete account
    - Find a way to deal with lost or forgotten passwords.
- Secure register with **CAPTCHA**



