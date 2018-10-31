[![Total Downloads](https://poser.pugx.org/swapnilsarwe/nova-icndb-card/downloads)](https://packagist.org/packages/swapnilsarwe/nova-icndb-card)

## Laravel Nova ICNDB Package
This packages uses the [ICNDB Api](http://www.icndb.com/api/) to show the random joke on a card on Laravel Nova Dashboard.

Here's how the card will look like on a dashboard.

![alt text](https://raw.githubusercontent.com/swapnilsarwe/nova-icndb/master/card.png "ICNDB Random Joke")

## Installation
You can install the packace in to a Laravel app that uses Nova via composer:
```
composer require swapnilsarwe/nova-icndb-card
```

As a next step you will have to register the card with your Nova App. You can achieve this by adding the package in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

public function cards()
{
    return [
        // ...
        new \Swapnilsarwe\NovaIcndbCard\NovaIcndbCard,
    ];
}
```

## Configuration
You can publish the config using the following command
```
php artisan vendor:publish --provider="Swapnilsarwe\NovaIcndbCard\CardServiceProvider"
```

Now you can configure the category from which you want to display facts on the dashboard.
The complete list of categories can be checked out here
```
http://api.icndb.com/categories
```

### Security

If you discover any security related issues, please email swapnilsarwe@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
