<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListByTag
 * @package App\Http\Controllers
 */
class ListByTag extends Controller
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
		$apiRequest = $request->input('apiRequest');

		$results = $this->repo->anyItemByTag($apiRequest->getInput());

		return $this->jsonResponse($results);
	}

	/**
	 * ListByTag constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
