# CollectionMacros

###Note: 
**Im going to move this repo to a 'Laravel Macros' repo, vs just 'Collection' macros.**

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

## Security

If you discover any security related issues, please email mail@jhavens.tech instead of using the issue tracker.

## License

MIT. Please see the [license file](license.md) for more information.


