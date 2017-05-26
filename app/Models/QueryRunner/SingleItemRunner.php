<?php

namespace App\Models\QueryRunner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payload\{
	PayloadInterface,PayloadFactoryInterface
};

class SingleItemRunner implements QueryRunnerInterface {
	use RunnerHelperTrait;

	private $factory;
	private $payload;

	public function queryFor(Request $request) : QueryRunnerInterface
	{
		/*
		 * TODO better input checks
		 * - check for digit, (\d+), e.g. /item/id/3
		 * - check for Chinese, (\p{Han}), e.g. /item/zh/改革开发
		 * - check for pinyin, ????
		 */
		$route = $this->getRoute($request);
		$query = $this->getQuery($request);
		switch($route)
		{
			case "item/id/":
				$results = DB::select('select * from slogans where slogan_id = :id', ['id' => $query]);
				$this->setPayload($results);
				return $this;
				break;

			case "item/zh/":
				$zh = urldecode($query);
				$results = DB::select('select * from slogans where slogans.zh = :zh', ['zh' => $zh]);
				$this->setPayload($results);
				return $this;
				break;

			case "item":
				$results = $this->getRandom();
				$this->setPayload($results);
				return $this;
				break;

			default:
				$results = $this->getRandom();
				$results['route'] = $route;
				$results['query'] = $query;
				$this->setPayload($results);
				return $this;
				break;
		}
	}

	public function setPayload(array $results) : QueryRunnerInterface
	{
		if(!$this->isEmptyArray($results))
		{
			$payload = $this->factory->create($results);
			$payload
				->setObjectType('item')
				->setMessage('Item found')
				->setStatusCode(200);
			$this->payload = $payload;
			return $this;
		}
		//else return 404
		$payload = $this->factory->create($results);
		$payload
			->setObjectType('item')
			->setMessage('Item not found')
			->setStatusCode(404);
		$this->payload = $payload;
		return $this;
	}

	public function getPayload() : PayloadInterface
	{
		return $this->payload;
	}

	/**
	 * ListAllRunner constructor.
	 *
	 * @param PayloadFactoryInterface $factory
	 */
	public function __construct(PayloadFactoryInterface $factory)
	{
		$this->factory = $factory;
	}
}