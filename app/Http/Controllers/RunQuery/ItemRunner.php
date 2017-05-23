<?php

namespace App\Http\Controllers\RunQuery;

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

	public function getSloganByText(string $text) : array
	{
		$text = '%'.trim($text,'"').'%';
		return DB::select('select * from slogans where zh LIKE id = :text', ['text' => $text]);
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
}