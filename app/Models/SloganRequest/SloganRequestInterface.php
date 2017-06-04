<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

/**
 * Interface SloganRequestInterface
 * @package App\Models\SloganRequest
 */
interface SloganRequestInterface
{
	/**
	 * @return string
	 */
	public function getInput() : string;

	/**
	 * SloganRequestInterface constructor.
	 *
	 * @param string|null $input
	 */
	public function __construct(string $input = null);
}
