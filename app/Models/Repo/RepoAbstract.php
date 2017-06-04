<?php

namespace App\Models\Repo;

use App\Models\SloganResponse\SloganResponseFactoryInterface;
use App\Models\SloganResponse\SloganResponseInterface;

/**
 * Class RepoAbstract
 * @package App\Models\Repo
 */
abstract class RepoAbstract
{
	protected $responseFactory;

	/**
	 * @param array $results
	 *
	 * @return SloganResponseInterface
	 */
	protected function wrap(array $results) : SloganResponseInterface
	{
		return $this->responseFactory->create($results);
	}

	/**
	 * RepoAbstract constructor.
	 *
	 * @param SloganResponseFactoryInterface $factory
	 */
	public function __construct(SloganResponseFactoryInterface $factory)
	{
		$this->responseFactory = $factory;
	}
}