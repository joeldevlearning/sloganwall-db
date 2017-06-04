<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

/**
 * Trait ExtractRequestDataTrait
 * @package App\Models\SloganRequest
 */
trait ExtractRequestDataTrait
{

    /*
     * UNUSED
     * opposite of extract query
     */
	/**
	 * @param Request $request
	 *
	 * @return string
	 */
	public function extractRoute(Request $request) : string
    {
        $path = $request->path();
        $everythingAfterSlash = '/([^\/]+$)/';
        return preg_replace($everythingAfterSlash, '', $path);
    }

	/**
	 * @param Request $request
	 *
	 * @return string
	 */
	public function extractQuery(Request $request) : string
    {
        $path = $request->path();
        $everythingAfterSlash = '/([^\/]+$)/';
        preg_match($everythingAfterSlash, $path, $matches);
        return $matches[1];
    }
}
