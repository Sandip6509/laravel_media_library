# laravel_media_library
composer require laravel/breeze
php artisan breeze:install
php artisan migrate

composer require "spatie/laravel-medialibrary:^10.0.0"
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="migrations"
php artisan migrate
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="config"
