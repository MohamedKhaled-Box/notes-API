<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

    1. Prerequisites
Ensure you have the following installed on your machine:

PHP (>= 7.3)
Composer
Node.js and npm
A web server (e.g., Apache, Nginx) or Laravel’s built-in server
A database server (e.g., MySQL, PostgreSQL, SQLite)
    2. Clone the Repository
bash
    3. Install Dependencies
Install PHP dependencies using Composer:

bash

composer install
Install JavaScript dependencies using npm:

bash

npm install
npm run dev
    4. Environment Configuration
Copy the .env.example file to .env and configure your environment settings, especially the database connection:

bash

cp .env.example .env
Generate the application key:

bash

php artisan key:generate
Configure the .env file to match your database settings:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
    5. Run Migrations
Run the database migrations and seeders to set up your database schema and initial data:

bash

php artisan migrate
    6. Start the Development Server
You can start the Laravel development server using the following command:

bash

php artisan serve
By default, the server will be accessible at http://127.0.0.1:8000.

    7. Running the Web Interface
To test the web interface:

Open your web browser and go to http://127.0.0.1:8000.
You should see the home page of your Laravel application.
Register a new user account by clicking on the "Register" link.
After registering, log in with your new account.
Test the profile management features by navigating to the profile page (by clicking in your username then profile).
Test the note management features by navigating to the notes page and performing CRUD operations (by clicking on the notes in the navbar).
    8. Running the API Endpoints
To test the API endpoints, you can use tools like Postman or Insomnia. Here are some example requests:

Registration
Endpoint: POST /api/register
Request Body:
json

{
  "name": "Test User",
  "email": "test@example.com",
  "password": "password",
  "password_confirmation": "password"
}
Login
Endpoint: POST /api/login

Request Body:

json

{
  "email": "test@example.com",
  "password": "password"
}
Response:

json

{
  "access_token": "your-access-token",
  "token_type": "Bearer"
}
Get Profile
Endpoint: GET /api/profile
Headers:
makefile

Authorization: Bearer your-access-token
Update Profile
Endpoint: PUT /api/profile
Headers:
makefile

Authorization: Bearer your-access-token
Request Body (example):
json

{
  "name": "Updated User",
  "email": "updated@example.com",
  "password": "newpassword",
  "password_confirmation": "newpassword"
}
Create Note
Endpoint: POST /api/notes
Headers:
makefile

Authorization: Bearer your-access-token
Request Body:
json

{
  "title": "Test Note",
  "content": "This is a test note."
}
Get Notes
Endpoint: GET /api/notes
Headers:
makefile

Authorization: Bearer your-access-token
Update Note
Endpoint: PUT /api/notes/{note_id}
Headers:
makefile

Authorization: Bearer your-access-token
Request Body:
json

{
  "title": "Updated Note",
  "content": "This is an updated note."
}
Delete Note
Endpoint: DELETE /api/notes/{note_id}
Headers:
makefile

Authorization: Bearer your-access-token
    9. Logging Out
To log out from the API:

Endpoint: POST /api/logout
Headers:
makefile

Authorization: Bearer your-access-token

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
