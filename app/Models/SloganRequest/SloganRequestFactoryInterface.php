<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

/**
 * Interface SloganRequestFactoryInterface
 * @package App\Models\SloganRequest
 */
interface SloganRequestFactoryInterface
{
	/**
	 * @param Request $request
	 *
	 * @return SloganRequestInterface
	 */
	public function create(Request $request) : SloganRequestInterface;
}
