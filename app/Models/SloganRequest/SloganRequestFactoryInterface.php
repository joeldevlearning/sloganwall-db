<?php

namespace App\Models\SloganRequest;


use Illuminate\Http\Request;

interface SloganRequestFactoryInterface {

	public function create(Request $request) : SloganRequestInterface;
}