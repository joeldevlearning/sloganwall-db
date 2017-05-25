<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Payload\PayloadInterface;

trait JsonResponderTrait {

	public function respondWithJson(PayloadInterface $payload) : JsonResponse
	{
		return response()
			->json($payload->getData(), $payload->getStatusCode(),
				[], JSON_UNESCAPED_UNICODE);
	}

}