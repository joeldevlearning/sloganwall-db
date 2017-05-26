<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueryRunner\ListByRunner;

class ListBy extends Controller
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

	public function __construct(ListByRunner $runner) {
		$this->runner = $runner;
	}

}
