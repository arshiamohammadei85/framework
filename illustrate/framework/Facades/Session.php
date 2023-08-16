<?php

namespace illustrate\Facades;

use illustrate\Application;

/**
 * Class Application Reactoor\illustrate
 * @author  ArshiaMohammadei <arshia8587@gmail.com>
 * @package illustrate\Facades
 */
class Session
{
	static function get($key)
	{
		return Application::$app->session->get($key);
	}

	static function set($key , $value)
	{
		Application::$app->session->set($key , $value);
	}

	static function remove($key)
	{
		Application::$app->session->remove($key);
	}

	static function get_flash($key)
	{
		Application::$app->session->getFlash($key);
	}

	static function set_flash($key , $message)
	{
		Application::$app->session->setFlash($key , $message);
	}
}