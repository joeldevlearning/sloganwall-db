<?php

namespace App\Models\SloganRequest;

/*
 * Lumen routes only support a subset of regex
 * So validation happens within the SloganRequestFactory
 * The factory itself is called in middleware
 */
//routes do not give full regex support, so skip that
trait ValidateSloganRequestTrait {

	private $Han = "/^\p{Han}+$/u";
	private $urlencoded = '/%[[:alnum:]]+/';
	private $HanLatinNum = '/[\p{Han}\p{Latin}\p{N}]+$/u';

	/*
	* e.g. "改革开发" encoded as "%E6%94%B9%E9%9D%A9%E5%BC%80%E5%8F%91"
	*/
	public function isUrlEncoded(string $query) : bool
	{
		if ( preg_match($this->urlencoded, $query) )
		{
			return TRUE;
		}
		return FALSE;
	}

	public function isValidZi(string $text) : bool
	{
		if ( preg_match($this->Han, $text) )
		{
			return TRUE;
		}
		return FALSE;
	}

	public function isValidText(string $text) : bool
	{
		if ( preg_match($this->HanLatinNum, $text) )
		{
			return TRUE;
		}
		return FALSE;
	}
}

