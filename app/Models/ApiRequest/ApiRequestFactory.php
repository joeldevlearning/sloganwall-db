<?php

namespace App\Models\ApiRequest;


use Illuminate\Http\Request;

class ApiRequestFactory implements ApiRequestFactoryInterface {

	use HttpRequestTrait;
	use ValidateTrait;

	public function create(Request $request) : ApiRequestInterface
	{
		if ($request->is('list/all/')) {
			//ignore input
			return new ApiRequest(null);
		}

		$rawInput = $this->extractQuery($request);

		if ($request->is('item/id/*')) {
			//only allow int
			return new ApiRequest($rawInput);
		}
		//else

		if($this->isUrlEncoded($rawInput))
		{
			$rawInput = urldecode($rawInput);
		}

		if($this->isValidText($rawInput))
		{
			return new ApiRequest($rawInput);
		}

		//nothing is valid
		return abort(422,"Invalid input");
	}
}