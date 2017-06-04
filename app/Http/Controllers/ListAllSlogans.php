<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

class ListAllSlogans extends Controller
{
	use JsonResponderTrait;
	private $repo;

	public function __invoke(Request $request)
	{
		$results = $this->repo->allSlogans();

		return $this->jsonResponse($results);
	}

	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
