<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PayloadFactoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(
			'App\Http\Controllers\PayloadFactoryInterface',
			'App\Http\Controllers\PayloadFactory');
	}

}