<?php

namespace App\Models\Payload;

interface PayloadFactoryInterface
{
	public function create(array $results) : PayloadInterface;

	public function __construct();
}