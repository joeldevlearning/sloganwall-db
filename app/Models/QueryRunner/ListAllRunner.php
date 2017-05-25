<?php

namespace App\Models\QueryRunner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payload\{
	PayloadInterface,PayloadFactoryInterface
};

class ListAllRunner implements QueryRunnerInterface {
	use RunnerHelperTrait;

	private $factory;
	private $payload;

	public function queryFor(Request $request) : QueryRunnerInterface
	{
		$path = $request->path();
		switch($path)
		{
			case "list/all/slogans":
				$results = DB::select('SELECT * FROM all_slogans_plus_related');
				$this->setPayload($results);
				return $this;
				break;

			case "list/all/zh":
				$results = DB::select('SELECT slogans.slogan_id, slogans.zh FROM slogans');
				$this->setPayload($results);
				return $this;
				break;

			case "list/all/translations":
				$results = DB::select('SELECT slogan_fk AS slogan_id,content FROM translations');
				$this->setPayload($results);
				return $this;
				break;

			case "list/all/notes":
				$results = DB::select('SELECT slogan_fk AS slogan_id,content FROM notes');
				$this->setPayload($results);
				return $this;
				break;

			case "list/all/tags":
				$results = DB::select('
				SELECT slogans.slogan_id, tags.label FROM slogans_to_tags
				JOIN slogans ON slogans_to_tags.slogan_fk = slogans.slogan_id
				FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
				');
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
				->setObjectType('list')
				->setMessage('List of items found')
				->setStatusCode(200);
			$this->payload = $payload;
			return $this;
		}
		//else return 404
		$payload = $this->factory->create($results);
		$payload
			->setObjectType('list')
			->setMessage('List contains no items')
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