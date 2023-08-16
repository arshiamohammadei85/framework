<?php

namespace illustrate\Facades;

use illustrate\Application;

/**
 * Class Application Reactoor\illustrate
 * @author  ArshiaMohammadei <arshia8587@gmail.com>
 * @package illustrate\Facades
 */
class Route
{
	static function get($url , $callback)
	{
		Application::$app->router->get($url,$callback);
	}
	static function post($url,$callback)
	{
		Application::$app->router->post($url,$callback);
	}
}