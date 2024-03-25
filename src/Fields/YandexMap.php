<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Fields\Input;

/**
 * Class YandexMap
 * @package Tersoft\OrchidFields\Fields
 *
 * @method Color title(string $value = null)
 * @method Color help(string $value = null)
 * @method Color popover(string $value = null)
 * @method Color disabled($value = true)
 */
class YandexMap extends Input
{
    /** @var string */
    protected $view = 'platform-fields::fields.yandex_map';

    /**
     * Default attributes value
     * @var array
     */
    protected $attributes = [
        'zoom' => 12,
        'zoomButton' => true,
        'point' => '37.588144, 55.733842',
        'language' => 'ru_RU',
        'markerColor' => '#16bbd8'
    ];

    /**
     * YandexMap constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->attributes['apiKey'] = env('YANDEX_MAP_KEY', false);
    }

    /**
     * @param int $zoom
     * @return $this
     */
    public function zoom(int $zoom)
    {
        $this->attributes['zoom'] = $zoom;
        return $this;
    }

    /**
     * @param string $point
     * @return $this
     */
    public function point(string $point)
    {
        $this->attributes['point'] = $point;
        return $this;
    }

    /**
     * @return $this
     */
    public function hideZoomButton()
    {
        $this->attributes['zoomButton'] = false;
        return $this;
    }

    /**
     * @param string $apiKey
     * @return $this
     */
    public function apiKey(string $apiKey)
    {
        $this->attributes['apiKey'] = $apiKey;
        return $this;
    }

    /**
     * @param string $value
     * @return $this|\Orchid\Screen\Field
     */
    public function language(string $value)
    {
        $this->attributes['language'] = $value;
        return $this;
    }

    /**
     * @param string $hexColor
     * @return $this
     */
    public function markerColor(string $hexColor)
    {
        $this->attributes['markerColor'] = $hexColor;
        return $this;
    }
}
