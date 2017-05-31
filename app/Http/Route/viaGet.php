<?php

$app->get('item/by/id/{id:[[0-9]+}', 'OneItemById'); //ok
$app->get('item/by/zh/{text}', 'OneItemByZh'); //ok
$app->get('item/random', 'OneItemRandom'); //ok

$app->get('list/all/slogans', 'ListAllSlogans');
$app->get('list/all/zh', 'ListAllZh');
$app->get('list/all/translations', 'ListAllTranslations');
$app->get('list/all/notes', 'ListAllNotes');
$app->get('list/all/tags', 'ListAllTags');

$app->get('list/by/zi/{text}', 'ListByZi');
$app->get('list/by/tag/{text}', 'ListByTag');
$app->get('list/by/translation/{text}', 'ListByTranslation');
$app->get('list/by/note/{text}', 'ListByNote');


/*
 * Make a list of all individual characters used in slogans
 * maybe also a histogram?
$app->get('list/all/uniquezi', 'JunkListAll');

/* How to regex on pinyin? is it practical?
 * $app->get('item/pinyin/{text}', 'JunkListAll');
 */

