Laravel Task Manager
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
Project Overview
Laravel Task Manager is a simple task management application built with Laravel 11. It allows users to manage their tasks efficiently by creating, reading, updating, and deleting their own tasks.

Features:
User Authentication: Each user can manage only their own tasks.
Task Management: Users can:
Create, update, or delete tasks.
Set the priority (High, Medium, Low) for each task.
Mark tasks as completed or not (using status).
Filtering by Priority and Status: Tasks can be filtered based on their priority and status.
Technologies Used
Laravel 11
PHP 8.0+
MySQL (or any supported database)
Installation
Clone the project:

git clone https://github.com/egzonmurati/Laravel-Task-Manager.git
Install dependencies:


cd Laravel-Task-Manager
composer install
Set up the environment file:


cp .env.example .env
Generate the application key:


php artisan key:generate
Run migrations to create the database tables:


php artisan migrate
Start the Laravel development server:


php artisan serve
You can now access the application at http://127.0.0.1:8000.

License
This project is open-source software licensed under the MIT License.

