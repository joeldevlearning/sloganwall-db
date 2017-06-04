<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repo\SloganRepo;

class OneItemById extends Controller
{
    use JsonResponderTrait;
    private $repo;

    public function __invoke(Request $request)
    {
        $apiRequest = $request->input('apiRequest');

        $results = $this->repo->oneItemById($apiRequest->getInput());

        return $this->jsonResponse($results);
    }

    public function __construct(SloganRepo $repo)
    {
        $this->repo = $repo;
    }
}
