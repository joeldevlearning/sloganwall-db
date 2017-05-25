<?php

namespace App\Models\QueryRunner;

use Illuminate\Http\Request;

trait RunnerHelperTrait {

	public function isEmptyArray(array $results) : bool
	{
		if(head($results))
		{
			return false;
		}
		return true;
	}
}