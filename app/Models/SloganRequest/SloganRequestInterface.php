<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

interface SloganRequestInterface {

	public function getInput() : string;

	public function __construct(string $input = null);
}