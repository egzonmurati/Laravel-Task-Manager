# Laravel Task Manager

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Project Overview

Laravel Task Manager is a simple task management application built with **Laravel 11**. 

It allows users to manage their tasks efficiently by creating, reading, updating, and deleting their own tasks.

## Features:
- **User Authentication**: Each user can manage only their own tasks.
<br>

- **Task Management**: Users can:
  - Create, update, or delete tasks.
  - Set the priority (High, Medium, Low) for each task.
  - Mark tasks as completed or not (using status).
<br>

- **Filtering by Priority and Status**: Tasks can be filtered based on their priority and status.

## Technologies Used
- **Laravel 11**
- **PHP 8.0+**
- **MySQL** (or any supported database)

## Installation

1. Clone the project:

    ```bash
    git clone https://github.com/egzonmurati/Laravel-Task-Manager.git
    ```

2. Install dependencies:

    ```bash
    cd Laravel-Task-Manager
    composer install
    ```

3. Set up the environment file:

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run migrations to create the database tables:

    ```bash
    php artisan migrate
    ```

6. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

You can now access the application at `http://127.0.0.1:8000`.

## License

This project is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT).
