<?php

namespace App\Models\SloganResponse;

class SloganResponseFactory implements SloganResponseFactoryInterface
{
    public function create(array $results) : SloganResponseInterface
    {
        return new SloganResponse($results);
    }

    public function __construct()
    {
    }
}
