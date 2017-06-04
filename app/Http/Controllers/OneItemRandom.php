<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class OneItemRandom
 * @package App\Http\Controllers
 */
class OneItemRandom extends Controller
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
		$response = $this->repo->random();

		return $this->jsonResponse($response);
	}

	/**
	 * OneItemRandom constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
	{
		$this->repo = $repo;
	}

}
