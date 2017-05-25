<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueryRunner\ListAllRunner;


class ListAll extends Controller
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

	public function slogans(Request $request)
	{
		$payload = $this->runner
				->queryFor($request)
				->getPayload();

		return $this->respondWithJson($payload);
	}

	public function zh(Request $request)
	{
		$payload = $this->runner
			->queryFor($request)
			->getPayload();

		return $this->respondWithJson($payload);
	}

	public function translations(Request $request)
	{
		$payload = $this->runner
			->queryFor($request)
			->getPayload();

		return $this->respondWithJson($payload);
	}

	public function notes(Request $request)
	{
		$payload = $this->runner
			->queryFor($request)
			->getPayload();

		return $this->respondWithJson($payload);
	}

	public function tags(Request $request)
	{
		$payload = $this->runner
			->queryFor($request)
			->getPayload();

		return $this->respondWithJson($payload);
	}

	public function __construct(ListAllRunner $runner) {
		$this->runner = $runner;
	}

}
