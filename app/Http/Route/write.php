<?php

/*
 * version API with header, e.g. "api-version: 1"
 */

$app->post('/update/slogan/{sloganId}', function ($sloganId) use ($app) {
	//TODO middleware to check for integer > 0 less than nine digits
	return "Updating slogan #{$sloganId}...";
});


/*
 * List routes
 *
update/slogan
update/tag
update/note
update/translation

create/slogan
create/tag
create/translation
create/note
 */
