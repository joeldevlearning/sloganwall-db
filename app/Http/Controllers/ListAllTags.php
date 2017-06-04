<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

class ListAllTags extends Controller
{
	use JsonResponderTrait;
	private $repo;

	public function __invoke(Request $request)
	{
		$results = $this->repo->allTags();

		return $this->jsonResponse($results);
	}

	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
