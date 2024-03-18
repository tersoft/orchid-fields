<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Concerns\ComplexFieldConcern;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;

/**
 * Class RateStars
 * @package Tersoft\OrchidFields\Fields
 *
 * @method RateStars title(string $value = null)
 * @method RateStars help(string $value = null)
 * @method RateStars popover(string $value = null)
 */
class RateStars extends Field implements ComplexFieldConcern
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

    /**
     * @return $this
     */
    public function readOnly()
    {
        $this->attributes['readOnly'] = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function showTextField()
    {
        $this->attributes['inputType'] = 'text';
        return $this;
    }

    /**
     * @param int $count
     * @return $this
     */
    public function count(int $count)
    {
        $this->attributes['count'] = $count;
        return $this;
    }

    /**
     * @param int|float $step
     * @return $this
     */
    public function step(float|int $step)
    {
        $this->attributes['step'] = $step;
        return $this;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function starSize(int $size)
    {
        $this->attributes['starSize'] = $size;
        return $this;
    }
}
