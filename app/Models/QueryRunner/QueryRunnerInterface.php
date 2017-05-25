<?php

namespace App\Models\QueryRunner;

use Illuminate\Http\Request;
use App\Models\Payload\{
	PayloadInterface, PayloadFactoryInterface
};

interface QueryRunnerInterface {
	public function queryFor(Request $request) : self;
	public function setPayload(array $results) : self;
	public function getPayload() : PayloadInterface;

	public function __construct(PayloadFactoryInterface $factory);
}