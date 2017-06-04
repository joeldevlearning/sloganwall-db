<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;
use App\Models\Formatter\JsonFormatter;

/**
 * Class ListByNote
 * @package App\Http\Controllers
 */
class ListByNote extends Controller
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

        $results = $this->repo->anyItemByNote($apiRequest->getInput());

        return $this->jsonResponse($results);
    }

	/**
	 * ListByNote constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
