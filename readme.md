# CollectionMacros

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

A list of macros I keep reusing. Packinging them up for easier usage.

## Installation

Via Composer

``` bash
$ composer require sourcefli/collection-macros
```

Returns one item when only one item is in the collection or when the amount requested is higher then the amount within the collection. (see example '3')

## Usage
```php
//1
collect(['foo','bar'])->randomOrFirst(); //=> returns a random item

//2
collect(['foo'])->randomOrFirst(); //=> returns first item

//3
collect(['foo','bar', /** ... +20 more items */ ])->randomOrFirst(15); //=> returns 15 random items

//4
collect(['foo','bar', /** ... +10 more items */ ])->randomOrFirst(15); //=> returns a random item (since amount requested is higher than the amount in the collection)
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email mail@jhavens.tech instead of using the issue tracker.

## Credits

- [Sourcefli][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sourcefli/collection-macros.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sourcefli/collection-macros.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sourcefli/collection-macros/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/sourcefli/collection-macros
[link-downloads]: https://packagist.org/packages/sourcefli/collection-macros
[link-travis]: https://travis-ci.org/sourcefli/collection-macros
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/sourcefli
[link-contributors]: ../../contributors
