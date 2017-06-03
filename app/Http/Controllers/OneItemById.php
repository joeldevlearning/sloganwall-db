<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;
use App\Models\Formatter\JsonFormat;

class OneItemById extends Controller
{
	use JsonResponderTrait;
	private $repo;
	private $format;

	public function __invoke(Request $request)
	{
		$apiRequest = $request->input('apiRequest');

		$results = $this->repo->oneItemById($apiRequest->getInput());

		$payload = $this->format->packPayload($results);

		return $this->jsonResponse($payload);
	}

	public function __construct(SloganRepo $repo, JsonFormat $format)
	{
		$this->repo = $repo;
		$this->format = $format;
	}

}
