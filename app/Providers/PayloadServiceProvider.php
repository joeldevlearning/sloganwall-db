<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PayloadServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(
			'App\Models\Payload\PayloadFactoryInterface',
			'App\Models\Payload\PayloadFactory');

		$this->app->bind(
			'App\Models\Payload\PayloadInterface',
			'App\Models\Payload\Payload');
	}

}