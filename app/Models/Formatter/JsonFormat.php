<?php

namespace App\Models\Formatter;

use App\Models\SloganResponse\{
	SloganResponseInterface,SloganResponseFactoryInterface
};

class JsonFormat {
	private $payloadFactory;

	public function packPayload(array $results) : SloganResponseInterface
	{
		return $this->payloadFactory->create($results);
	}

	public function __construct(SloganResponseFactoryInterface $factory)
	{
		$this->payloadFactory = $factory;
	}
}