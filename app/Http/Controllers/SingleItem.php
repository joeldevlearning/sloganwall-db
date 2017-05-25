<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueryRunner\ListAllRunner;


class SingleItem extends Controller
{
	use JsonResponderTrait;
	private $runner;

	public function id()
	{
		$payload = $this->runner
				->queryFor('SingleId')
				->getPayload();

		return $this->respondWithJson($payload);
	}

	public function zh(Request $request)
	{
		$payload = $this->runner
			->queryFor('SingleZh', $request->input('id'))
			->getPayload();

		return $this->respondWithJson($payload);
	}


	public function __construct(SingleItemRunner $runner) {
		$this->runner = $runner;
	}

}
