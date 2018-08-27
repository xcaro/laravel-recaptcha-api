
Recaptcha for Laravel 5
===

## Installation
Require this package with composer. It is recommended to only require the package for development.
```
composer require xcaro/google-recaptcha-api
```
### Laravel 5.5+:
Add the ServiceProvider to the providers array in config/app.php:
```php
xcaro\Recaptcha\RecaptchaServiceProvider::class,
```
and the following to `aliases`:
```php
'Recaptcha' => xcaro\Recaptcha\Facades\Recaptcha::class,
```
Copy the package config to your local config with the publish command
```
php artisan vendor:publish --provider="xcaro\Recaptcha\RecaptchaServiceProvider"
```
Add settings reCAPTCHA in your `.env`
```
GOOGLE_RECAPTCHA_KEY="${public_key}"
GOOGLE_RECAPTCHA_SECRET="${secret_key}"
```
### Usage
1. In your form, use `{!! Recaptcha::render() !!}` to echo out the markup.
2. In your validation rules, add the following:
```php
$rules = [
	// your validation
	'g-recaptcha-response' => 'required|recaptcha', // reCaptcha validation
 ];
```
## Customization
### Language
Would default the language in all the reCAPTCHAs to English. If you want to further customize, you can pass options through the render option:
```php
Recaptcha::render([ 'lang' => 'fr' ]);
```
Options passed into `Recaptcha::render` will always supersede the configuration.