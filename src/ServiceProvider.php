<?php

namespace SuperCollection;

/**
 * Class ServiceProvider
 * @package SuperCollection
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Collection::class, function () {
            return Collection::class;
        });
    }
}