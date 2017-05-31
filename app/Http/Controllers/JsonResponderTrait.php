<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Payload\PayloadInterface;

trait JsonResponderTrait {

	//deprecated
	public function respondWithJson(PayloadInterface $payload) : JsonResponse
	{
		return response()
			->json($payload->getData(), $payload->getStatusCode(),
				[], JSON_UNESCAPED_UNICODE);
	}

	public function jsonResponse(PayloadInterface $payload) : JsonResponse
	{
		return response()
			->json($payload->getData(), 200,
				[], JSON_UNESCAPED_UNICODE);
	}

}