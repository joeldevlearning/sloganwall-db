<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

/**
 * Class SloganRequest
 * @package App\Models\SloganRequest
 */
class SloganRequest implements SloganRequestInterface
{
    protected $input;

	/**
	 * @return string
	 */
	public function getInput(): string
    {
        return $this->input;
    }

	/**
	 * SloganRequest constructor.
	 *
	 * @param string|null $input
	 */
	public function __construct(string $input = null)
    {
        $this->input = $input;
    }
}
