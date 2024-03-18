<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Fields\Input;

/**
 * Class InputSlug
 * @package Tersoft\OrchidFields\Fields
 *
 * @method InputSlug title(string $value = null)
 * @method InputSlug help(string $value = null)
 * @method InputSlug popover(string $value = null)
 * @method InputSlug disabled($value = true)
 */
class InputSlug extends Input
{
    /** @var string */
    protected $view = 'platform-fields::fields.slug';

    /**
     * Default attributes value
     * @var array
     */
    protected $attributes = [
        'undefinedSymbol' => '-',
    ];

    /**
     * @param string $symbol
     * @return $this
     */
    public function undefinedSymbol(string $symbol)
    {
        $this->attributes['undefinedSymbol'] = $symbol;
        return $this;
    }
}
