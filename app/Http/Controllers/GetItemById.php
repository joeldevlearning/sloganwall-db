<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,Response};
use App\Http\Controllers\RunQuery\ItemRunner;

class GetItemById extends Controller
{
	private $runner;

    /**
     * Retrieve single slogan for the given ID.
     *
     * @param Request $request
     * @return Response
     */
    public function main(Request $request, int $id)
    {
        //TODO error handling for non-integers on this route

	    $results = $this->runner->getSlogan($id);

	    if(!$results)
	    {
	    	$results = $this->runner->getRandomSlogan();
		    $status = $this->runner->onFailure('status');
		    $note = $this->runner->onFailure('note');
	    }
	    else
	    {
		    $status = $this->runner->onSuccess('status');
		    $note = $this->runner->onSuccess('note');
	    }

	    $sloganId = $results[0]->slogan_id;
	    $sloganZh = $results[0]->zh;
	    $sloganPinyin = $results[0]->pinyin;
	    $sloganSummary = $results[0]->desc_summary;

        $payload = [
            'object'    => 'slogan',
	        'note'      => $note,
            'data' => array(
            	'slogan_id'         => $sloganId,
                'slogan_zh'         => $sloganZh,
                'slogan_pinyin'     => $sloganPinyin,
                'slogan_summary'    => $sloganSummary
            )];

        return response()->json($payload, $status, [], JSON_UNESCAPED_UNICODE);
    }

    public function __construct(ItemRunner $runner) {
        $this->runner = $runner;
    }
}
