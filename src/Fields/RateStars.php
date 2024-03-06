<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Field;

/**
 * Class RateStars
 * @package Tersoft\OrchidFields\Fields
 */
class RateStars extends Field
{
    /** @var string */
    protected $view = 'platform-fields::fields.rate';

    /**
     * Default attributes value
     * @var array
     */
    protected $attributes = [
        'count' => 5,
        'step'  => 1,
        'readOnly' => false,
        'starSize' => 25,
        'inputType' => 'hidden',
    ];

    /**
     * Attributes available for particular tag
     * @var string[]
     */
    protected $inlineAttributes = [
      'title',
      'value'
    ];
}
