<?php

namespace App\Models\Payload;

interface PayloadInterface {
	public function getStatusCode() : int;
	public function getData() : array;

	public function setStatusCode( int $statusCode ): Payload;
	public function setMessage( string $message ): Payload;
	public function setObjectType( string $objectType ): Payload;

	public function __construct(array $results);
}