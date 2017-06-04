<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListAllNotes
 * @package App\Http\Controllers
 */
class ListAllNotes extends Controller
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
        $results = $this->repo->allNotes();

        return $this->jsonResponse($results);
    }

	/**
	 * ListAllNotes constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
