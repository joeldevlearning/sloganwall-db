<?php

namespace App\Models\ApiRequest;

use Illuminate\Http\Request;

interface ApiRequestInterface {

	public function getInput() : string;

	public function __construct(string $input = null);
}