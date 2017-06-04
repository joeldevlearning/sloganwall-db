<?php

namespace App\Models\SloganResponse;

/**
 * Class SloganResponseFactory
 * @package App\Models\SloganResponse
 */
class SloganResponseFactory implements SloganResponseFactoryInterface
{
	/**
	 * @param array $results
	 *
	 * @return SloganResponseInterface
	 */
	public function create(array $results) : SloganResponseInterface
    {
        return new SloganResponse($results);
    }

	/**
	 * SloganResponseFactory constructor.
	 */
	public function __construct()
    {
    }
}
