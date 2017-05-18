<?php

namespace App\Http\Controllers;

class GetSloganById extends Controller
{
	/**
	 * Retrieve the slogan for the given ID.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function pull(int $id)
	{
		$string = "实事求是";
		$responseCode = 200;

		$header = array (
			'Content-Type' => 'application/json; charset=UTF-8',
			'charset' => 'utf-8'
		);

		return response()->json($string , $responseCode, $header, JSON_UNESCAPED_UNICODE);
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
}
