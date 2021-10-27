## Installation 

Install PHP 7.3 + version and composer

Install Mysql 8.0.27

Clone the repository

    git clone <git url>

Switch to the repository folder

    cd weather-app

Setup project environment

    cp .env.example .env

Create Database called 'weather_app'

Setup DB_USERNAME and DB_PASSWORD in .env file

Setup WHETHER_API_KEY in .env file (https://openweathermap.org/api/one-call-api)

Install vendor packages

    composer install

Install npm package manager

    npm install

Generate app key

    php artisan key:generate

Run the database migrations

    php artisan migrate

Vuejs app build

    npm run dev

Start application

    php artisan serve

You can access the application at http://127.0.0.1:8000


## Libraries 

Laravel JetStream (https://jetstream.laravel.com/2.x/introduction.html)

Guzzle http package (https://packagist.org/packages/guzzlehttp/guzzle)
