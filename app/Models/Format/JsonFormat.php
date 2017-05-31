<?php

namespace App\Models\Format;

use App\Models\Payload\{
	PayloadInterface,PayloadFactoryInterface
};

class JsonFormat {
	private $payloadFactory;

	public function packPayload(array $results) : PayloadInterface
	{
		return $this->payloadFactory->create($results);
	}

	public function __construct(PayloadFactoryInterface $factory)
	{
		$this->payloadFactory = $factory;
	}
}