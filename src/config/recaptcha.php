<?php

return [
	
	'public_key' => env('GOOGLE_RECAPTCHA_KEY', null),

	'private_key' => env('GOOGLE_RECAPTCHA_SECRET', null),

	'view' => 'recaptcha',

	'lang' => 'en',
];