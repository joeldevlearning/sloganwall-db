<?php

namespace App\Models\QueryRunner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payload\{
	PayloadInterface,PayloadFactoryInterface
};

class ListByRunner implements QueryRunnerInterface {
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
		if(!$query)
		{
			$results =
			$this->setPayload($results);
			return $this;
		}
		switch($route)
		{
			case "list/by/zi/":
				$decoded = urldecode($query);
				$zi = '%'.trim($decoded,'"').'%';
				$results = DB::select('
			SELECT * FROM slogans WHERE zh LIKE :text', ['text' => $zi]);

				if(!$results)
				{//if fails, try again with just first character
					$firstChar = mb_substr($decoded, 0, 1, 'utf-8'); //grab first character only
					$newZi = '%'.$firstChar.'%';
					$results = DB::select('
			SELECT * FROM slogans WHERE zh LIKE :text', ['text' => $newZi]);
					$results[25] = "this is the " . $newZi;
				}
				$this->setPayload($results);
				return $this;
				break;

			case "list/by/tag/":
				//TODO add support for Chinese tags
				$tag = '%'.trim($query,'"').'%';
				$results = DB::select('
		SELECT slogans.slogan_id, tags.label FROM slogans_to_tags
        JOIN slogans ON slogans_to_tags.slogan_fk = slogans.slogan_id
        FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
        WHERE tags.label ILIKE :text', ['text' => $tag]);
				$this->setPayload($results);
				return $this;
				break;

			case "list/by/note/":
				//TODO add support for Chinese tags
				$note = '%'.trim($query,'"').'%';
				$results = DB::select('
		SELECT slogan_fk AS slogan_id,content 
		FROM notes 
		WHERE notes.content ILIKE :text', ['text' => $note]);
				$this->setPayload($results);
				return $this;
				break;

			case "list/by/translation/":
				//TODO add support for Chinese tags
				$translation = '%'.trim($query,'"').'%';
				$results = DB::select('
		SELECT slogan_fk AS slogan_id,content 
		FROM translations 
		WHERE translations.content ILIKE :text', ['text' => $translation]);
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