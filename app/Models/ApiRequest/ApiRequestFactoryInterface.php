<?php

namespace App\Models\ApiRequest;


use Illuminate\Http\Request;

interface ApiRequestFactoryInterface {

	public function create(Request $request) : ApiRequestInterface;
}