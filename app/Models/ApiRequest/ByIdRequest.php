<?php

namespace App\Models\ApiRequest;

use Illuminate\Http\Request;

class ByIdRequest implements ApiRequestInterface {
	use HttpRequestTrait;
	use ValidateTrait;

	protected $route;
	protected $query;

	public function getInput(): string
	{
		return $this->query;
	}

	public function __construct(Request $request)
	{
		$this->route = $this->extractRoute($request);
		$rawQuery = $this->extractQuery($request);

		//validate and store
		$this->query = $rawQuery;
	}
}