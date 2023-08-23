# Laravel Non Null Collection Cast

Simple cast for Laravel Eloquent models that allows you to cast a field to a non-null collection.

## Installation

```bash
composer require jessegall/laravel-non-null-collection-cast
```

## Usage

```php
use Illuminate\Database\Eloquent\Model;
use JesseGall\Laravel\Database\Casts\AsNonNullCollection;

class MyModel extends Model {

    protected $casts = [
        'my_field' => AsNonNullCollection::class,
    ];
    
}
```