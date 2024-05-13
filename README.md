<h2 align="center">Orchid Fields</h2>
<p align="center">Package add different fields in Laravel Orchid</p>


## Installation
```bash
composer require tersoft/orchid-fields
```

Next, you should publish resources files using the `vendor:publish` Artisan command.

```bash
 php artisan vendor:publish --tag=tersoft-orchid-fields
```


### Slug
- Auto generate slug

<p align="left"><img src="https://github.com/tersoft/orchid-fields/raw/master/images/doc/slug.jpg" alt="Slug Laravel Orchid"></p>

```php
use Tersoft\OrchidFields\Fields\InputSlug;

InputSlug::make('category.title')
    ->set('data-slug', 'category[slug]') // category[slug] - field to generate slug
    ->undefinedSymbol('_'), // default "-"
    
Input::make('category.slug'), // field to generate slug
```


### Star
- Unlimit stars
- Select step
- Input value in field

<p align="left"><img src="https://github.com/tersoft/orchid-fields/raw/master/images/doc/star.jpg" alt="Star Laravel Orchid"></p>

```php
use Tersoft\OrchidFields\Fields\RateStars;

RateStars::make('star')
    ->count(5) // count stars
    ->step(1) // step
    ->readOnly() // star only read
    ->starSize(25) // stars size
    ->showTextField(), // show number input field
```

### GitHub
* Create [issues](https://github.com/tersoft/orchid-fields/issues) to ask questions or report problems.
