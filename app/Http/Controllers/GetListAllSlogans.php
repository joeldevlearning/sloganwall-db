<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,Response};
use App\Http\Controllers\RunQuery\ListRunner;

class GetListAllSlogans extends Controller
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
	    $results = $this->runner->getAllSlogans();

	    if(!$results)
	    {
		    $status = $this->runner->onFailure('status');
		    $note = $this->runner->onFailure('note');
	    }
		else
		{
			$status = $this->runner->onSuccess('status');
			$note = $this->runner->onSuccess('note');
		}
        $payload = [
            'object'    => 'slogan-list',
            'note'      => $note,
            'data'      => $results
            ];

	    return response()->json($payload, $status, [], JSON_UNESCAPED_UNICODE);
    }

	public function __construct(ListRunner $runner) {
		$this->runner = $runner;
	}

}
