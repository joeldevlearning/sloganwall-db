<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

class SloganRequest implements SloganRequestInterface
{
    protected $input;

    public function getInput(): string
    {
        return $this->input;
    }

    public function __construct(string $input = null)
    {
        $this->input = $input;
    }
}
