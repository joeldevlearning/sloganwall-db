<?php

namespace App\Models\Formatter;

use App\Models\SloganResponse\SloganResponseInterface;
use App\Models\SloganResponse\SloganResponseFactoryInterface;

class JsonFormat
{
    private $responseFactory;

    public function packPayload(array $results): SloganResponseInterface
    {
        return $this->responseFactory->create($results);
    }

    public function __construct(SloganResponseFactoryInterface $factory)
    {
        $this->responseFactory = $factory;
    }
}
