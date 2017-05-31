<?php

namespace App\Models\ApiRequest;

use Illuminate\Http\Request;

class ApiRequest implements ApiRequestInterface {
	protected $input;

	public function getInput(): string
	{
		return $this->input;
	}

	public function __construct(string $input = null)
	{
		$this->input = $input;
	}
}