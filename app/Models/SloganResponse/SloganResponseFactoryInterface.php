<?php

namespace App\Models\SloganResponse;

/**
 * Interface SloganResponseFactoryInterface
 * @package App\Models\SloganResponse
 */
interface SloganResponseFactoryInterface
{
	/**
	 * @param array $results
	 *
	 * @return SloganResponseInterface
	 */
	public function create(array $results) : SloganResponseInterface;

	/**
	 * SloganResponseFactoryInterface constructor.
	 */
	public function __construct();
}
