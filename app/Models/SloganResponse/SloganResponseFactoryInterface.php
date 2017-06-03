<?php

namespace App\Models\SloganResponse;

interface SloganResponseFactoryInterface
{
	public function create(array $results) : SloganResponseInterface;

	public function __construct();
}