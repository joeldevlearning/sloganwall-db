<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\SloganResponse\SloganResponseInterface;

trait JsonResponderTrait
{

    //deprecated
    public function respondWithJson(SloganResponseInterface $payload) : JsonResponse
    {
        return response()
            ->json($payload->getData(), $payload->getStatusCode(),
                [], JSON_UNESCAPED_UNICODE);
    }

    public function jsonResponse(SloganResponseInterface $payload) : JsonResponse
    {
        return response()
            ->json($payload->getData(), 200,
                [], JSON_UNESCAPED_UNICODE);
    }
}
