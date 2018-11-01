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

if for some reason new options are added in config are not visible - do the following
```
php artisan vendor:publish --provider="Swapnilsarwe\NovaIcndbCard\CardServiceProvider" --force
```

Also you can use your own name in the joke by updating the following values in the icndb-config.php in config folder

```php
...
'name_to_use' => [
    'first_name' => 'Chuck', // type in your own first name
    'last_name' => 'Norris', // type in your own last name
],
...
```

Now you can configure the category from which you dont want to display jokes on the dashboard.

The complete list of categories can be checked out here
```
http://api.icndb.com/categories
```

By default all jokes marked as `explicit` are excluded. You can update the config as per your need.
```php
...
'excluded_categories' => [ // jokes belonging to following categories will not be shown
    'explicit',
],
...
```

### Security

If you discover any security related issues, please email swapnilsarwe@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
