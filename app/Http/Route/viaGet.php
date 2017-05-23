<?php

/*
 * version API with header, e.g. "api-version: 1"
 */

$app->get('item/id/{id}', 'GetItemById@main');

$app->get('item/text/{text}', 'GetItemByText@main');


/*
 * List routes
 *
 * /list/all/
/list/match/tag
/list/match/text
/list/match/translation
/list/match/note

 */
