<?php

namespace App\Models\ApiRequest;

use Illuminate\Http\Request;

trait HttpRequestTrait {

	public function extractRoute(Request $request) : string
	{
		$path = $request->path();
		$everythingAfterSlash = '/([^\/]+$)/';
		return preg_replace($everythingAfterSlash, '', $path);
	}

	public function extractQuery(Request $request) : string
	{
		$path = $request->path();
		$everythingAfterSlash = '/([^\/]+$)/';
		preg_match($everythingAfterSlash, $path, $matches);
		return $matches[1];
	}

	public function isEmpty(string $var) : bool
	{
		if(is_numeric($var) && !$var)
		{
			return TRUE;
		}
		return empty($var) && !is_numeric($var);
	}
}