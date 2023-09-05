## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository:

    git clone https://github.com/borjajw/weather-app.git

Go to the application folder:

    cd weather-app

Install PHP dependencies:

    composer install

Install JavaScript dependencies:

    npm install

Create a copy of the .env.example file and rename it to .env.:

    cp .env.example .env

Generate the application key:

    php artisan key:generate

Update the .env file with the appropriate database credentials and create:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

Run the migration and seeders:

    php artisan migrate --seed

Start the local development server:

    php artisan serve

## Usage

    Visit http://localhost:8000 in your browser to access the application.