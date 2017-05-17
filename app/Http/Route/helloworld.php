<?php

$app->get('/', function () use ($app) {
	return 'Hello! Root route is working.';
});

$app->get('/hello', function () use ($app) {
	return 'Hello this world!';
});

$app->get('/hello/big/world', function () use ($app) {
	return 'Hello this big world!';
});