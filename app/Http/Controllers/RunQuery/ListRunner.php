<?php

namespace App\Http\Controllers\RunQuery;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\{PayloadInterface, PayloadFactoryInterface};

class ListRunner {
	private $factory;

	public function getAllSlogans() : array
	{
		return DB::select('
			SELECT
			  slogans.zh,
			  slogans.pinyin,
			  slogans.desc_summary,
			  array_to_json(array_agg(DISTINCT translations.content),TRUE) as translation,
			  array_to_json(array_agg(DISTINCT notes.content),TRUE) as note,
			  array_to_json(array_agg(DISTINCT tags.label),TRUE) as tag
			FROM
			slogans
			FULL JOIN slogans_to_tags ON slogans_to_tags.slogan_fk = slogans.slogan_id
			FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
			FULL JOIN translations ON slogans.slogan_id = translations.slogan_fk
			FULL JOIN notes ON slogans.slogan_id = notes.slogan_fk
			  WHERE slogan_id IS NOT NULL
			GROUP BY
			  zh, pinyin, desc_summary
		');
	}

	public function GetListAllZh() : PayloadInterface
	{
		$results = DB::select('SELECT slogans.slogan_id, slogans.zh FROM slogans');
		if($results)
		{
			$payload = $this->factory
				->create($results);
			$payload
				->setObjectType('slogan-list')
				->setNote('List of slogans found')
				->setStatusCode(200);
			return $payload;
		}
			$payload = $this->factory
				->create($results);
			$payload
				->setObjectType('slogan-list')
				->setNote('List of slogans not found')
				->setStatusCode(404);
			return $payload;
	}

	public function onSuccess($element)
	{
		switch($element){
			case 'status': return 200; break;
			case 'note': return 'Items found'; break;
		}
	}

	public function onFailure($element)
	{
		switch($element){
			case 'status': return 404; break;
			case 'note': return 'No items found'; break;
		}
	}

	/**
	 * ListRunner constructor.
	 *
	 * @param PayloadFactoryInterface $factory
	 */
	public function __construct(PayloadFactoryInterface $factory)
	{
		$this->factory = $factory;
	}
}