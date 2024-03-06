
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
    ->set('data-slug', 'category[slug]')
    ->undefinedSymbol('=') // default "-"
```





### Star
```php
use Tersoft\OrchidFields\Fields\RateStars;

RateStars::make('star')
    ->count(5)
    ->step(1)
    ->readOnly(false)
    ->starSize(25)
    ->inputType('hidden'),
```





### Tree
```php
use \Tersoft\OrchidFields\Fields\Tree;

Tree::make('category')
    ->showSearch(true)
    ->searchPlaceholder('Поиск')
    ->actions([
    'Редактировать' => ['platform.post_category.edit', ['category' => '_id']],
    'Редакт' => ['platform.post_category.edit', ['category' => '_id']],
])
```


### GitHub
* Create [issues](https://github.com/tersoft/orchid-fields/issues) to ask questions or report problems.
