<?php

namespace App\Models\QueryRunner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait RunnerHelperTrait {

	public function isEmptyArray(array $results) : bool
	{
		if(head($results))
		{
			return false;
		}
		return true;
	}

	public function getRoute(Request $request) : string
	{
		$path = $request->path();
		$everythingAfterSlash = '/([^\/]+$)/';
		return preg_replace($everythingAfterSlash, '', $path);
	}

	public function getQuery(Request $request) : string
	{
		$path = $request->path();
		$everythingAfterSlash = '/([^\/]+$)/';
		preg_match($everythingAfterSlash, $path, $matches);
		return $matches[1];
	}

	/*
	 * TODO redundant with above two functions
	 */
	public function splitRouteAndQuery(Request $request) : array
	{
		$path = $request->path();
		$everythingAfterSlash = '/([^\/]+$)/';
		$parts['route'] = preg_replace($everythingAfterSlash, '', $path);
		preg_match($everythingAfterSlash, $path, $matches);
		$parts['query'] = $matches[1];

		return $parts;
	}

	public function getRandom() : array
	{
		return DB::select('select * from slogans order by RANDOM() limit 1');
	}
}