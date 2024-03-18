<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Fields;

use Orchid\Screen\Field;

/**
 * Class Tree
 * @package Tersoft\OrchidFields\Fields
 */
class Tree extends Field
{
    /** @var string */
    protected $view = 'platform-fields::fields.tree.tree';

    /**
     * Default attributes value
     * @var array
     */
    protected $attributes = [
        'showSearch' => false,
        'searchPlaceholder' => 'Поиск',
        'actions' => []
    ];

    /**
     * Attributes available for particular tag
     * @var string[]
     */
    protected $inlineAttributes = [
        'title'
    ];

    /**
     * @param string $searchPlaceholder
     * @return $this
     */
    public function showSearch($searchPlaceholder = false)
    {
        $this->attributes['showSearch'] = true;
        if ($searchPlaceholder) {
            $this->attributes['searchPlaceholder'] = $searchPlaceholder;
        }
        return $this;
    }
}
