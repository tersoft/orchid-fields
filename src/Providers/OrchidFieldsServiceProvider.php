<?php

declare(strict_types=1);

namespace Tersoft\OrchidFields\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;

class OrchidFieldsServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     */
    public function boot(Dashboard $dashboard): void
    {
        $path = dirname(__DIR__, 1) . '/../resources/views/';
        $this->loadViewsFrom($path, 'platform-fields');
        $dashboard->registerResource('scripts', asset('/vendor/tersoft-orchid-fields/js/orchid_fields.js'));
        $this->registerAssets();
    }

    /**
     * Register assets.
     * @return $this
     */
    protected function registerAssets(): self
    {
        $sourcePath =  dirname(__DIR__, 1) . '/public/js/';
        $this->publishes(
            [
                $sourcePath => public_path('vendor/tersoft-orchid-fields/js/'),
                '/images/' => 'images/'
            ],
            'tersoft-orchid-fields'
        );

        return $this;
    }
}
