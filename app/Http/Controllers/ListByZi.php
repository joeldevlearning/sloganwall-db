<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

class ListByZi extends Controller
{
    use JsonResponderTrait;
    private $repo;
    private $format;

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

    public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
