<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\SloganResponse\SloganResponseInterface;

/**
 * Trait JsonResponderTrait
 * @package App\Http\Controllers
 */
trait JsonResponderTrait
{
	/**
	 * @param SloganResponseInterface $payload
	 *
	 * @return JsonResponse
	 */
	public function jsonResponse(SloganResponseInterface $payload) : JsonResponse
    {
        return response()
            ->json($payload->getData(), 200,
                [], JSON_UNESCAPED_UNICODE);
    }
}
