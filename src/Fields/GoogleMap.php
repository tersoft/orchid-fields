<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Fields\Input;

/**
 * Class GoogleMap
 * @package Tersoft\OrchidFields\Fields
 *
 * @method Color title(string $value = null)
 * @method Color help(string $value = null)
 * @method Color popover(string $value = null)
 * @method Color disabled($value = true)
 */
class GoogleMap extends Input
{
    /** @var string */
    protected $view = 'platform-fields::fields.google_map';

    /**
     * Default attributes value
     * @var array
     */
    protected $attributes = [
        'zoom' => 12,
        'point' => '37.588144, 55.733842',
    ];

    /**
     * YandexMap constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->attributes['apiKey'] = env('GOOGLE_MAP_KEY', false);
        $this->attributes['mapId'] = env('GOOGLE_MAP_ID', 'DEMO_MAP_ID');
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
     * @param string $apiKey
     * @return $this
     */
    public function apiKey(string $apiKey)
    {
        $this->attributes['apiKey'] = $apiKey;
        return $this;
    }

    /**
     * @param string $mapId
     * @return $this
     */
    public function mapId(string $mapId)
    {
        $this->attributes['mapId'] = $mapId;
        return $this;
    }
}
