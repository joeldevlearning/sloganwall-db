<?php

namespace App\Models\ApiRequest;

use Illuminate\Http\Request;

class ByTextRequest implements ApiRequestInterface {
	use HttpRequestTrait;
	use ValidateTrait;

	protected $route;
	protected $query;

	public function getValue(): string
	{
		return $this->query;
	}

	public function __construct(Request $request)
	{
		$this->route = $this->extractRoute($request);

		$rawQuery = $this->extractQuery($request);
		if($this->isUrlEncoded( $rawQuery ))
		{
			//decode $rawQuery
			$rawQuery = urldecode($rawQuery);
		}
			//validate and store
			$this->query = $rawQuery;
		}
}