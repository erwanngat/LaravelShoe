# Shoe sales website 

## This project is a website for selling shoes, with ***user management***.

This project was made in PHP 8.2.0 using Laravel framework v10.34.2 and Tailwind CSS framework v3.3.6.
It includes:
- A CRUD
- An API for CRUD
- User management with middleware
- Livewire for interactive functionalities
- Data validation for ensuring accuracy
- Migrations and Seeders Management

## Installation requirements
- Composer
- PHP
- Node.js and NPM
- A database system like MySQL

## Installation
```bash
# Clone this repository
$ git clone https://github.com/erwanngat/LaravelShoe

# Go into the repository
$ cd LaravelShoe

# Install dependencies
$ npm install
$ composer install

# Generate your key
$ php artisan key:generate

# Set up your .env file with your database information

# Migrate the database
$ php artisan migrate --seed

# Start your local server 
$ php artisan serve

# Compile assets
$ npm run dev

# Access the website
$ In your browser, type http://localhost:8000

# Default Accounts
Two default accounts have been created:
- Normal user account:
  - Username: test@test.com
  - Password: password
- Admin account:
  - Username: admin@admin.com
  - Password: password

You can use these accounts to explore the different user roles and functionalities in the application.
```

## License 

Code Licensed Under [GPL v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html) | Content Under [CC BY 3.0](https://creativecommons.org/licenses/by/3.0/)
