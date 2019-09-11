<?php

namespace xcaro\Recaptcha;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->handleView();
		$this->addValidator();

		$configPath = __DIR__ . '/config/recaptcha.php';
		$this->publishes([$configPath => $this->getConfigPath()], 'config');
	}

	/**
	 * Register reCaptcha services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->handleConfig();
		$this->bindRecaptcha();

		$this->app->singleton(Recaptcha::class);
		$this->app->alias(Recaptcha::class, 'recaptcha');
	}

	public function bindRecaptcha()
	{
		$this->app->bind('recaptcha.rule', function () {
			return new Rules\ValidRecaptcha;
		});
		$this->app->bind('recaptcha', function () {
			return new Recaptcha;
		});
	}
	protected function handleConfig()
	{
		$this->mergeConfigFrom(
			__DIR__ . '/config/recaptcha.php', 'recaptcha'
		);
	}
	protected function handleView()
	{
		$this->loadViewsFrom(
			__DIR__ . '/views', 'recaptcha'
		);
	}

	protected function getConfigPath()
	{
		return config_path('recaptcha.php');
	}

	protected function addValidator()
	{
		$this->app->validator->extendImplicit('recaptcha', function ($attribute, $value, $parameters, $validator) {
			return app('recaptcha.rule')->passes($attribute, $value);
		}, app('recaptcha.rule')->message());
	}

	/**
	 * get the services provided by the provider
	 * @return array
	 */
	public function provides()
	{
		return ['recaptcha'];
	}

}
