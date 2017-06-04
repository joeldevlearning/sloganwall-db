<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListAllTags
 * @package App\Http\Controllers
 */
class ListAllTags extends Controller
{
	use JsonResponderTrait;
	private $repo;

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function __invoke(Request $request)
	{
		$results = $this->repo->allTags();

		return $this->jsonResponse($results);
	}

	/**
	 * ListAllTags constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
