# Laravel Non Null Collection Cast

Simple cast for Laravel Eloquent models that allows you to cast a field to a non-null collection.

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