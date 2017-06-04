<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListByZi
 * @package App\Http\Controllers
 */
class ListByZi extends Controller
{
    use JsonResponderTrait;
    private $repo;
    private $format;

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function __invoke(Request $request)
    {
        $apiRequest = $request->input('apiRequest');

        $zi = $apiRequest->getInput();
        $results = $this->repo->anyItemByZi($zi);

        if (!$results) {//if fails, try again with just first character
            $results = $this->repo->anyItemByFirstZi($zi);
        }

        return $this->jsonResponse($results);
    }

	/**
	 * ListByZi constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
