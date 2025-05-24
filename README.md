# Employee Management System - Laravel Application
A PHP + MySQL web application built with Laravel that provides:
* User authentication (login/register)
* Employee CRUD operations
* Employee statistics dashboard

# Prerequisites
* PHP 8.1 or higher
* Node.js (v16+ recommended)
* MySQL 5.7+ or MariaDB
* Web server (Apache/Nginx) or PHP built-in server

# Installation
1. Clone the repository
```bash
    git clone https://github.com/your-repo/employee-management.git
    cd employee-management
```
2. Install dependencies:
```bash
    composer install
    npm install
```
3. Configure ```.env```:
```bash
    cp .env.example .env
    php artisan key:generate
```
4. Set up db:
```bash
    php artisan migrate
```

# Running the Application (on ```http://localhost:8000```);
```bash
    php artisan serve
```
