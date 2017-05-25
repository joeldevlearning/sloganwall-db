<?php

namespace App\Models\Payload;

class Payload implements PayloadInterface {

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
	 * @return Payload
	 */
	public function setStatusCode( int $statusCode ): Payload {
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @param string $message
	 *
	 * @return Payload
	 */
	public function setMessage( string $message ): Payload {
		$this->message = $message;

		return $this;
	}

	/**
	 * @param mixed $objectType
	 *
	 * @return Payload
	 */
	public function setObjectType( string $objectType ) : Payload
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