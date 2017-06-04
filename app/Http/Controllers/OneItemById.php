<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class OneItemById
 * @package App\Http\Controllers
 */
class OneItemById extends Controller
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

        $results = $this->repo->oneItemById($apiRequest->getInput());

        return $this->jsonResponse($results);
    }

	/**
	 * OneItemById constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
