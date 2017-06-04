<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

class OneItemRandom extends Controller
{
	use JsonResponderTrait;
	private $repo;

	public function __invoke(Request $request)
	{
		$response = $this->repo->random();

		return $this->jsonResponse($response);
	}

	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
