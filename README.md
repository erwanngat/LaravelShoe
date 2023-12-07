# Shoe sales website 

## This project is a website for selling shoes, with ***user management*** and a ***shopping cart feature*** included.

This project was made using Laravel framework v10.34.2 and Tailwind CSS framework v3.3.6.
It includes:
- A CRUD
- An API for CRUD
- User management with middleware
- Livewire for interactive functionalities
- Data validation for ensuring accuracy

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
```

## License 

Code Licensed Under [GPL v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html) | Content Under [CC BY 3.0](https://creativecommons.org/licenses/by/3.0/)
