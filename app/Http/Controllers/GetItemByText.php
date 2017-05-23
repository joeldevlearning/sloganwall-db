<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,Response};
use App\Http\Controllers\RunQuery;

class GetItemByText extends Controller
{
	private $runner;
	//TODO middleware to detect Chinese characters preg_match("/\p{Han}+/u", $utf8_str);
	//TODO middleware to detect if pinyin

    /**
     * Retrieve single slogan for the given string of characters.
     *
     * @param Request $request
     * @return Response
     */
    public function main(Request $request, string $text)
    {
    	$results = $this->runner->getRandomSlogan();

	    //$sloganText = urldecode($sloganText);

	    $status = $this->runner->onSuccess('status');
	    $note = $this->runner->onSuccess('note');

	    $sloganId = $results[0]->slogan_id;
	    $sloganZh = $results[0]->zh;
	    $sloganPinyin = $results[0]->pinyin;
	    $sloganSummary = $results[0]->desc_summary;

        $payload = [
            'object'=> 'slogan',
            'data' => array(
            	'slogan_id'         => $sloganId,
                'slogan_zh'         => $sloganZh,
                'slogan_pinyin'     => $sloganPinyin,
                'slogan_summary'    => $sloganSummary
            )];

	    return response()->json($payload, $status, [], JSON_UNESCAPED_UNICODE);
    }

	public function __construct(RunQuery\ItemRunner $runner) {
		$this->runner = $runner;
	}

}
