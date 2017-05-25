<?php

/*
 * Accepts positive integer
 */
$app->get('item/id/{id}', 'GetItemById@main');

/*
 * Accepts partial/full utf-8 or url-encoded strings
 * e.g. "%E6%94%B9%E9%9D%A9%E5%BC%80%E5%8F%91" or "改革开发"
 */
$app->get('item/zi/{text}', 'GetItemByZi@main');

/*
 * How to map pinyin to characters in database?
 */
//$app->get('item/pinyin/{text}', 'GetItemByPinyin@main');


$app->get('list/all/slogans', 'GetListAllSlogans@main');

$app->get('list/all/zh', 'GetListAllSlogansZh@main');
/*
$app->get('list/all/zh', 'GetListAllSlogansZh@main');

$app->get('list/all/translations', 'GetListAllTranslations@main');
$app->get('list/all/tags', 'GetListAllTags@main');
$app->get('list/all/notes', 'GetListAllNotes@main');

$app->get('list/by/tag/{tag}', 'GetListByTag@main');
$app->get('list/by/zi/{zi}', 'GetListByZi@main');
$app->get('list/by/translation/{translation}', 'GetListByTranslation@main');
$app->get('list/by/note/{note}', 'GetListByNote@main');
*/

/*
 * Make a list of all individual characters used in slogans
 * maybe also a histogram?
$app->get('list/all/uniquezi', 'GetListAllUniqueZi@main');

*/
