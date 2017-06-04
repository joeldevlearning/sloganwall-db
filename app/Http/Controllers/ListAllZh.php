<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListAllZh
 * @package App\Http\Controllers
 */
class ListAllZh extends Controller
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
        $results = $this->repo->allZh();

        return $this->jsonResponse($results);
    }

	/**
	 * ListAllZh constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
