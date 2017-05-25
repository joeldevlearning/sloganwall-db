<?php

namespace App\Http\Controllers\RunQuery;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\{PayloadInterface, PayloadFactoryInterface};

class ListRunner {
	private $factory;

	public function getAllSlogans() : array
	{
		return DB::select('
			SELECT * FROM all_slogans_plus_related');
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