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
<p align="left"><img src="http://terberry.ru/other-files/slug.jpg" alt="Slug Laravel Orchid"></p>

```php
use Tersoft\OrchidFields\Fields\InputSlug;

InputSlug::make('category.title')
    ->set('data-slug', 'category[slug]') // category[slug] - field to generate slug
    ->undefinedSymbol('_'), // default "-"
    
Input::make('category.slug'), // field to generate slug
```


### Color
- 3 themes
- HEX or RGB format
<p align="left">
    <img src="http://terberry.ru/other-files/color-hex.jpg" alt="Color Laravel Orchid" width="275px">
    <img src="http://terberry.ru/other-files/color-hex-2.jpg" alt="Color Laravel Orchid" width="300px">
    <img src="http://terberry.ru/other-files/color-rgb.jpg" alt="Color Laravel Orchid" width="225px">
</p>

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
- Unlimit stars
- Select step
- Input value in field
<p align="left"><img src="http://terberry.ru/other-files/star.jpg" alt="Star Laravel Orchid"></p>

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
- Search by tree
- Add action button

<p align="left"><img src="http://terberry.ru/other-files/tree.jpg" alt="Tree Laravel Orchid"></p>

```php
use \Tersoft\OrchidFields\Fields\Tree;

Tree::make('category')
    ->showSearch('Поиск')  // show search field, params - placeholder
    ->actions([
        'Edit' => ['get', 'platform.post_category.edit', ['category' => '_id']], // Edit - name, get - method, platform.post_category.edit - route name, ['category' => '_id'] - params to route
        'Delete' => ['post', 'platform.post_category.edit', ['category' => '_id'], '/remove'], // Delete - name, post - method, platform.post_category.edit - route name, ['category' => '_id'] - params to route, /remove - postscript at the end
    ])
```



### YandexMap
- Select coordinates to yandex map

<p align="left"><img src="http://terberry.ru/other-files/yandex-map.jpg" alt="Tree Laravel Orchid"></p>

```php
use \Tersoft\OrchidFields\Fields\YandexMap;

YandexMap::make('coords')
    ->apiKey('YOU_API_KEY') // optional - here or add YANDEX_MAP_KEY in .env
    ->zoom(8) // zoom map, default 12
    ->language('en_US') // map language, default ru_RU, avaliable: ru_RU, ru_UA, uk_UA, tr_TR, en_RU, en_US, he_IL, en_IL
    ->hideZoomButton() // hide button to zoom map
    ->markerColor('#16bbd8') // marker color, default '#16bbd8'
    ->point('37.588144, 55.733842'), // center if not value, default '37.588144, 55.733842' Moscow
```



### GoogleMap
- Select coordinates to google map

<p align="left"><img src="http://terberry.ru/other-files/google-map.jpg" alt="Tree Laravel Orchid"></p>

```php
use \Tersoft\OrchidFields\Fields\GoogleMap;

GoogleMap::make('coords')
    ->apiKey('YOU_API_KEY') // optional - here or add GOOGLE_MAP_KEY in .env
    ->mapId('YOU_MAP_ID') // optional - here or add  GOOGLE_MAP_ID in .env
    ->zoom(8) // zoom map, default 12
    ->point('37.588144, 55.733842'), // center if not value, default '37.588144, 55.733842' Moscow
```

### GitHub
* Create [issues](https://github.com/tersoft/orchid-fields/issues) to ask questions or report problems.
