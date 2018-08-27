<?php

namespace xcaro\Recaptcha;


class Recaptcha
{

	function __construct()
	{
		// 
	}

	/**
	 * Render the reCaptcha view
	 * @param  array  $config [custom reCaptcha]
	 * @return view
	 */
	public function render($config = [])
	{
		$data = [
			'public_key' => app('config')->get('recaptcha.public_key'),
		];
		$data['lang'] = isset($config['lang']) ? $config['lang'] : app('config')->get('recaptcha.lang');

		$view = $this->getView();

		return app('view')->make($view, $data);
	}

	/**
	 * Get the view path
	 * @return [string] [view name]
	 */
	protected function getView(): string
	{
		$view = 'recaptcha::' . app('config')->get('recaptcha.view');

		return $view;
	}
}