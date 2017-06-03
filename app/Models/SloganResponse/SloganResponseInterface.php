<?php

namespace App\Models\SloganResponse;

interface SloganResponseInterface {
	public function getStatusCode() : int;
	public function getData() : array;

	public function setStatusCode( int $statusCode ): SloganResponse;
	public function setMessage( string $message ): SloganResponse;
	public function setObjectType( string $objectType ): SloganResponse;

	public function __construct(array $results);
}