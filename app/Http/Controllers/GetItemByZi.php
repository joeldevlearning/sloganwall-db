<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,Response};
use App\Http\Controllers\RunQuery\ItemRunner;

class GetItemByZi extends Controller
{
	private $runner;
    /**
     * Retrieve single slogan for the given string of characters.
     *
     * @param Request $request
     * @return Response
     */
    public function main(Request $request, string $text)
    {
	    $text = urldecode($text); //Chinese is mangled for transit

	    /*
	     * What if character is not Chinese?
	     * TODO create isChinese() to pregmatch for Han characters
	     * detect Chinese characters preg_match("/\p{Han}+/u", $utf8_str);
	     */

	    /*
	     * What if one character in sequence is wrong?
	     * Then we should make
	     * TODO create searchByFirstCharacter() to try to recover bad search
	     */


	    $results = $this->runner->getSloganByZi($text);

	    if(!$results)
	    {
		    $status = $this->runner->onFailure('status');
		    $note = $this->runner->onFailure('note');
	    	/*
	    	 * try to find a character match
	    	 * if nothing at least return a random slogan
	    	 */
		    $results = $this->runner->searchByFirstCharacter($text);
		    if(!$results)
		    {
			    $results = $this->runner->getRandomSlogan();
		    }
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
            'data'      => array(
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
