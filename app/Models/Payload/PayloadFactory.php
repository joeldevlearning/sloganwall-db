<?php

namespace App\Models\Payload;

class PayloadFactory implements PayloadFactoryInterface
{
	public function create(array $results) : PayloadInterface
	{
		return new Payload($results);
	}

	public function __construct() {}
}