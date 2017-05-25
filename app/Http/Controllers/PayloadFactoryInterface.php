<?php

namespace App\Http\Controllers;

interface PayloadFactoryInterface
{
	public function create(array $results) : PayloadInterface;

	public function __construct();
}