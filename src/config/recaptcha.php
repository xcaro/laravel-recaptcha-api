<?php

return [

	/**
	 * Public key
	 * Use this in the HTML code your site serves to users.
	 */
	'public_key' => env('GOOGLE_RECAPTCHA_KEY', null),

	/**
	 * Secret key
	 * Use this for communication between your site and Google. Be sure to keep it a secret.
	 */
	'private_key' => env('GOOGLE_RECAPTCHA_SECRET', null),

	/**
	 * 
	 */
	'view' => 'recaptcha',
	
	/**
	 * 
	 */
	'lang' => 'en',
];