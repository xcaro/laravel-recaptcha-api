<?php

namespace xcaro\Recaptcha;


class Recaptcha
{
	protected $service;

	protected $config = [];
	

	function __construct()
	{
		// $this->service = $service;
		// $this->config = $config;
	}

	public function render($config = [])
	{
		$data = [
			'public_key' => app('config')->get('recaptcha.public_key'),
		];
		$data['lang'] = isset($config['lang']) ? $config['lang'] : app('config')->get('recaptcha.lang');

		$view = $this->getView();

		return app('view')->make($view, $data);
	}

	protected function getView(): string
	{
		$view = 'recaptcha::' . app('config')->get('recaptcha.view');

		return $view;
	}
}