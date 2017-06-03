<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SloganRequestResponseProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Models\SloganResponse\SloganResponseFactoryInterface',
            'App\Models\SloganResponse\SloganResponseFactory');

        $this->app->bind(
            'App\Models\SloganResponse\SloganResponseInterface',
            'App\Models\SloganResponse\SloganResponse');

        $this->app->bind(
            'App\Models\SloganRequest\SloganRequestInterface',
            'App\Models\SloganRequest\SloganRequest');

        $this->app->bind(
            'App\Models\SloganRequest\SloganRequestFactoryInterface',
            'App\Models\SloganRequest\SloganRequestFactory');
    }
}
