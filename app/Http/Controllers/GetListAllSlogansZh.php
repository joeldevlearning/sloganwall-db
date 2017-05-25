<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};
use App\Http\Controllers\RunQuery\ListRunner;

class GetListAllSlogansZh extends Controller
{
	private $runner;
    /**
     * Retrieve all slogans and related records
     *
     * @param Request $request
     * @return Response
     */
    public function main(Request $request)
    {
	    $results = $this->runner->getListAllZh();

	    return response()->json(
	    	$results->getData(),
		    $results->getStatusCode(),
		    [], JSON_UNESCAPED_UNICODE);
    }

	public function __construct(ListRunner $runner) {
		$this->runner = $runner;
	}

}
