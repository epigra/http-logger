# Epigra Laravel HTTP Logger

With our special thanks to Spatie and spatie/laravel-http-logger

## Installation

You can install the package via composer:

``` bash
$ composer require epigra/httplogger
```

Optionally you can publish the configfile with:
```bash
php artisan vendor:publish --provider="Epigra\HttpLogger\HttpLoggerServiceProvider" --tag="config" 
```

in your env file
```
LOG_REQUESTS=true
LOG_RESPONSES=true
```

## Usage

This packages provides a middleware which can be added as a global middleware or as a single route.

```php
// in `app/Http/Kernel.php`

protected $middleware = [
    // ...
    
    \Epigra\HttpLogger\Middlewares\HttpLogger::class
];
```

```php
// in a routes file

Route::post('/submit-form', function () {
    //
})->middleware(\Epigra\HttpLogger\Middlewares\HttpLogger::class);
```

You can use custom channel configuration on your config.php file by adding

```php
    'http-logger' => [
        'driver' => 'daily',
        'path' => storage_path('logs/responses_requests.log'),
    ],
```

to your channels array.