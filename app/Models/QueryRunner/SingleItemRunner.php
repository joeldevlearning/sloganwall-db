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

	public function queryFor(string $queryLabel, Request $request) : QueryRunnerInterface
	{
		switch($queryLabel)
		{
			case "SingleId":
				$id = $request->input('id');
				$results = DB::select('select * from slogans where slogan_id = :id', ['id' => $id]);
				$this->setPayload($results);
				return $this;
				break;

			case "SingleZh":
				$results = DB::select('SELECT slogans.slogan_id, slogans.zh FROM slogans');
				$this->setPayload($results);
				return $this;
				break;

			default:
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