<?php

namespace App\Http\Controllers;

interface PayloadInterface {
	public function getStatusCode() : int;
	public function getData() : array;

	public function setStatusCode( int $statusCode ): Payload;
	public function setNote( string $note ): Payload;
	public function setObjectType( string $objectType ): Payload;

	public function __construct(array $results);
}