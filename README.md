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

```php
use Tersoft\OrchidFields\Fields\InputSlug;

InputSlug::make('category.title')
    ->set('data-slug', 'category[slug]') // category[slug] - field to generate slug
    ->undefinedSymbol('_') // default "-"
```


### Color
- 3 themes
- hex or rgb format
```php
use Tersoft\OrchidFields\Fields\Color;

Color::make('color')
    ->themeLarge() // ->themePill() ->themePolaroid() ->themeLarge() - available themes
    ->lightMode() // ->darkMode(), default auto mode
    ->formatRgb() // set RGB format (default: hex)
    ->closeButton('Close') // show close button with text 'Close' (default: not show)
    ->showSwatches(['#264653', '#2a9d8f']), // show swatches (params not required default ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51', '#d62828', '#023e8a', '#0077b6', '#0096c7', '#00b4d8', '#48cae4', ])
```


### Star
- unlimit stars
- select step
```php
use Tersoft\OrchidFields\Fields\RateStars;

RateStars::make('star')
    ->count(5) // count stars
    ->step(1) // step
    ->readOnly() // star only read
    ->starSize(25) // stars size
    ->showTextField(), // show number input field
```


### Tree
- search by tree
- add button
```php
use \Tersoft\OrchidFields\Fields\Tree;

Tree::make('category')
    ->showSearch('Поиск')  // show search field, params - placeholder
    ->actions([
        'Edit' => ['get', 'platform.post_category.edit', ['category' => '_id']], // Edit - name, get - method, platform.post_category.edit - route name, ['category' => '_id'] - params to route
        'Delete' => ['post', 'platform.post_category.edit', ['category' => '_id'], '/remove'], // Delete - name, post - method, platform.post_category.edit - route name, ['category' => '_id'] - params to route, /remove - postscript at the end
    ])
```


### GitHub
* Create [issues](https://github.com/tersoft/orchid-fields/issues) to ask questions or report problems.
