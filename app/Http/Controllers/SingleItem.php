<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueryRunner\SingleItemRunner;

class SingleItem extends Controller
{
	use JsonResponderTrait;
	private $runner;

	public function __invoke(Request $request)
	{
		$payload = $this->runner
			->queryFor($request)
			->getPayload();

		return $this->respondWithJson($payload);
	}

	public function __construct(SingleItemRunner $runner) {
		$this->runner = $runner;
	}

}
