<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Fields\Input;

/**
 * Class Color
 * @package Tersoft\OrchidFields\Fields
 *
 * @method Color title(string $value = null)
 * @method Color help(string $value = null)
 * @method Color popover(string $value = null)
 * @method Color disabled($value = true)
 */
class Color extends Input
{
    /** @var string */
    protected $view = 'platform-fields::fields.color';

    /**
     * Default attributes value
     * @var array
     */
    protected $attributes = [
        'theme' => 'default',
        'themeMode' => 'auto',
        'format' => 'hex',
        'closeButton' => false,
        'closeLabel' => '',
        'showSwatches' => false,
        'swatches' => ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51', '#d62828', '#023e8a', '#0077b6', '#0096c7', '#00b4d8', '#48cae4', ],
    ];

    /**
     * @return $this
     */
//    public function large()
//    {
//        $this->attributes['large'] = true;
//        return $this;
//    }

    /**
     * @return $this
     */
    public function darkMode()
    {
        $this->attributes['themeMode'] = 'dark';
        return $this;
    }

    /**
     * @return $this
     */
    public function lightMode()
    {
        $this->attributes['themeMode'] = 'light';
        return $this;
    }

    /**
     * @return $this
     */
    public function formatRgb()
    {
        $this->attributes['format'] = 'rgb';
        return $this;
    }


    /**
     * @param string $buttonName
     * @return $this
     */
    public function closeButton(string $buttonName)
    {
        $this->attributes['closeButton'] = true;
        $this->attributes['closeLabel'] = $buttonName;
        return $this;
    }

    /**
     * @param array $swatches
     * @return $this
     */
    public function showSwatches($swatches = [])
    {
        $this->attributes['showSwatches'] = true;
        if ($swatches) {
            $this->attributes['swatches'] = $swatches;
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function themeLarge()
    {
        $this->attributes['theme'] = 'large';
        return $this;
    }

    /**
     * @return $this
     */
    public function themePolaroid()
    {
        $this->attributes['theme'] = 'polaroid';
        return $this;
    }

    /**
     * @return $this
     */
    public function themePill()
    {
        $this->attributes['theme'] = 'pill';
        return $this;
    }
}
