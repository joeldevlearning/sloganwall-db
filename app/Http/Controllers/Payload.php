<?php

namespace App\Http\Controllers;

class Payload implements PayloadInterface {

	private $statusCode;
	private $objectType;
	private $note;
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
	 * @param string $note
	 *
	 * @return Payload
	 */
	public function setNote( string $note ): Payload {
		$this->note = $note;

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
			'note'      => $this->note,
			'data'      => $this->results
		];
	}
	public function __construct( array $results=[] ) {
		$this->results = $results;
	}




}