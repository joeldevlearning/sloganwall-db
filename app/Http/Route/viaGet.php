<?php

$app->get('item/id/{id}', 'SingleItem');
$app->get('item/zh/{text}', 'SingleItem');
$app->get('item/random', 'SingleItem');

$app->get('list/all/slogans', 'ListAll');
$app->get('list/all/zh', 'ListAll');
$app->get('list/all/translations', 'ListAll');
$app->get('list/all/notes', 'ListAll');
$app->get('list/all/tags', 'ListAll');

/*
 * Accepts partial/full utf-8 or url-encoded strings
 * e.g. "%E6%94%B9%E9%9D%A9%E5%BC%80%E5%8F%91" or "改革开发"
 */
$app->get('list/by/zi/{text}', 'ListBy');
$app->get('list/by/tag/{text}', 'ListBy');
$app->get('list/by/translation/{text}', 'ListBy');
$app->get('list/by/note/{text}', 'ListBy');


/*
 * Make a list of all individual characters used in slogans
 * maybe also a histogram?
$app->get('list/all/uniquezi', 'ListAll');

/* How to map pinyin to characters in database?
 * $app->get('item/pinyin/{text}', 'ListAll');
 */

