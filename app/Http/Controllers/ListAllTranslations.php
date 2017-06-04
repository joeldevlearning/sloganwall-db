<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

/**
 * Class ListAllTranslations
 * @package App\Http\Controllers
 */
class ListAllTranslations extends Controller
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
        $results = $this->repo->allTranslations();

        return $this->jsonResponse($results);
    }

	/**
	 * ListAllTranslations constructor.
	 *
	 * @param SloganRepo $repo
	 */
	public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
