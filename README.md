# Laravel query class

<img src="https://banners.beyondco.de/Laravel%20Query%20Class.png?theme=light&packageManager=composer+require&packageName=ArielMejiaDev%2Flaravel-query-class&pattern=ticTacToe&style=style_1&description=helps+to+handle+requests+with+multiple+filters%2C+sorts+and+includes&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" />

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arielmejiadev/laravel-query-class.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/laravel-query-class)
[![Total Downloads](https://img.shields.io/packagist/dt/arielmejiadev/laravel-query-class.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/laravel-query-class)
![GitHub Actions](https://github.com/arielmejiadev/laravel-query-class/actions/workflows/main.yml/badge.svg)

It generates query classes to handle requests with multiple filters, sorts and includes.

The idea comes as a tip from a <a target="_blank" href="https://youtu.be/FxACh4X-Xc0?t=1448">LaraconUS 2019 talk from Freek Van der Herten</a>

## Installation

You can install the package via composer:

```bash
composer require arielmejiadev/laravel-query-class --dev
```

## Stubs & Commands installation

```bash
php artisan query-class:install
```

## Usage

```bash
php artisan make:query Users/UserQuery --model=User
```

It would generate a class in `app/Http/Queries/Users/UserQuery.php`:

You can choose if your query class would extend from `Spatie Query Builder` (REST API STANDARD) of from an `Eloquent` query class (for custom cases).

![Screen Shot 2021-07-12 at 23 03 53](https://user-images.githubusercontent.com/31971074/125394326-c66af600-e366-11eb-8344-a9be05b8fcb1.png)

```bash
namespace App\Http\Queries\Users;

use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

class UserQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(User::query());

        $this->allowedFilters('updated_at', 'created_at')
            ->allowedSorts('created_at')
            ->allowedIncludes('team');
    }
}
```

You can chain any Eloquent method or if you choose Spatie Query Builder methods from both tools. 

Now you can inject the Query Class in any controller constructor and the Laravel container will resolve it by itself.

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email arielmejiadev@gmail.com instead of using the issue tracker.

## Credits

-   [Ariel Mejia Dev](https://github.com/arielmejiadev)
-   [Freek Van der Herten](https://github.com/freekmurze)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
