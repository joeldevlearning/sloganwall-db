<?php

$app->get('/s/id/{sloganId}', function ($sloganId) use ($app) {
	//TODO middleware to check for integer > 0 less than nine digits
	return "Searching for slogan #{$sloganId}...";
});

$app->get('/s/text/{sloganText}', function ($sloganText) use ($app) {
	//TODO middleware to check for integer > 0 less than nine digits
	//TODO middleware to urldecode chinese
	//TODO middleware to detect Chinese characters preg_match("/\p{Han}+/u", $utf8_str);
	//TODO middleware to detect if pinyin

	$sloganText = urldecode($sloganText);
	$header = array (
		'Content-Type' => 'application/json; charset=UTF-8',
		'charset' => 'utf-8'
	);
	return response()->json($sloganText , 200, $header, JSON_UNESCAPED_UNICODE);
});