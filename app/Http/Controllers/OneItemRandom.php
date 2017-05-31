<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;
use App\Models\Format\JsonFormat;

class OneItemRandom extends Controller
{
	use JsonResponderTrait;
	private $repo;
	private $format;

	public function __invoke(Request $request)
	{
		$results = $this->repo->random();

		$payload = $this->format->packPayload($results);

		return $this->jsonResponse($payload);
	}

	public function __construct(SloganRepo $repo, JsonFormat $format)
	{
		$this->repo = $repo;
		$this->format = $format;
	}

}
