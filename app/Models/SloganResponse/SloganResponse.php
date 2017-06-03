<?php

namespace App\Models\SloganResponse;

class SloganResponse implements SloganResponseInterface {

	private $statusCode;
	private $objectType;
	private $message;
	private $results;

	public function getStatusCode(): int {
		return $this->statusCode;
	}

	/**
	 * @param int $statusCode
	 *
	 * @return SloganResponse
	 */
	public function setStatusCode( int $statusCode ): SloganResponse {
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @param string $message
	 *
	 * @return SloganResponse
	 */
	public function setMessage( string $message ): SloganResponse {
		$this->message = $message;

		return $this;
	}

	/**
	 * @param mixed $objectType
	 *
	 * @return SloganResponse
	 */
	public function setObjectType( string $objectType ) : SloganResponse
	{
		$this->objectType = $objectType;

		return $this;
	}

	public function getData() : array
	{
		return  [
			'object'    => $this->objectType,
			'message'   => $this->message,
			'data'      => $this->results
		];
	}
	public function __construct( array $results=[] ) {
		$this->results = $results;
	}




}