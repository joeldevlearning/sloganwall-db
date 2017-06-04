<?php

namespace App\Models\Repo;

use App\Models\SloganResponse\SloganResponseFactoryInterface;
use App\Models\SloganResponse\SloganResponseInterface;

abstract class RepoAbstract
{
	protected $responseFactory;

	protected function wrap(array $results) : SloganResponseInterface
	{
		return $this->responseFactory->create($results);
	}

	public function __construct(SloganResponseFactoryInterface $factory)
	{
		$this->responseFactory = $factory;
	}
}