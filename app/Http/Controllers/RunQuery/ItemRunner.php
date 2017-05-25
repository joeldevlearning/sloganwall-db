<?php

namespace App\Http\Controllers\RunQuery;

use App\Http\Controllers\PayloadFactoryInterface;
use Illuminate\Support\Facades\DB;

class ItemRunner {

	public function getSlogan(int $id) : array
	{
		return DB::select('select * from slogans where slogan_id = :id', ['id' => $id]);
	}

	public function getRandomSlogan() : array
	{
		return DB::select('select * from slogans order by RANDOM() limit 1');
	}

	public function getSloganByZi(string $text) : array
	{
		$text = '%'.trim($text,'"').'%';
		return DB::select('select * from slogans where zh LIKE :text', ['text' => $text]);
	}

	public function searchByFirstCharacter(string $text) : array
	{
		//grab first character from string
		$text = mb_substr($text, 0, 1, 'utf-8'); //grab first character only
		return $this->getSloganByZi($text);
	}


	public function onSuccess($element)
	{
		switch($element){
			case 'status': return 200; break;
			case 'note': return 'Item found'; break;
		}
	}

	public function onFailure($element)
	{
		switch($element){
			case 'status': return 404; break;
			case 'note': return 'Item not found'; break;
		}
	}

	public function __construct()
	{

	}
}