<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Fields\Input;

/**
 * Class InputSlug
 * @package Tersoft\OrchidFields\Fields
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
}
