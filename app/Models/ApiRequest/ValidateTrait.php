<?php

namespace App\Models\ApiRequest;

trait ValidateTrait {

	private $Han = '[\p{Han}]+';
	private $urlencoded = '%[[:alnum:]]+';
	private $HanLatinNum = '[\p{Han}\p{Latin}\p{N}]+';

	/*
 * Accepts partial/full utf-8 or url-encoded strings
 * e.g. "%E6%94%B9%E9%9D%A9%E5%BC%80%E5%8F%91" or "改革开发"
 */
	public function isUrlEncoded(string $query) : bool
	{
		return TRUE;
	}

	public function isValidZi(string $text) : bool
	{
		return TRUE;
	}

	public function isValidText(string $text) : bool
	{
		/*
		 * accept Han, Latin, and digits
		 */
		return TRUE;
	}
}

/*
 * - routes do not give full regex support, so skip that
- controllers can access ValidateTrait for validation help
	- no param routes just reject all params
	- ItemZh and ListByZi check for encoding, if present decode, then validate Chinese
	- ListByTag/Note/Translation check for encoding, if present decode, then validate Chinese/Latin/Digits

- ItemZh accepts only Chinese (encoded is possible)
- ListByZi accepts only Chinese, optionally urlencoded
- ItemRandom and JunkListAll* accept NO parameters
- ListByTag/Note/Translation accept Chinese (encoded or not)/Latin/Digits

 *
 *
 */
