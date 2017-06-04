<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListByTranslation
 * @package App\Http\Controllers
 */
class ListByTranslation extends Controller
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

		$results = $this->repo->anyItemByTranslation($apiRequest->getInput());

		return $this->jsonResponse($results);
	}

	/**
	 * ListByTranslation constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
