<?php

namespace App\Models\SloganResponse;

/**
 * Interface SloganResponseInterface
 * @package App\Models\SloganResponse
 */
interface SloganResponseInterface
{
	/**
	 * @return int
	 */
	public function getStatusCode() : int;

	/**
	 * @return array
	 */
	public function getData() : array;

	/**
	 * @param int $statusCode
	 *
	 * @return SloganResponse
	 */
	public function setStatusCode(int $statusCode): SloganResponse;

	/**
	 * @param string $message
	 *
	 * @return SloganResponse
	 */
	public function setMessage(string $message): SloganResponse;

	/**
	 * @param string $objectType
	 *
	 * @return SloganResponse
	 */
	public function setObjectType(string $objectType): SloganResponse;

	/**
	 * SloganResponseInterface constructor.
	 *
	 * @param array $results
	 */
	public function __construct(array $results);
}
