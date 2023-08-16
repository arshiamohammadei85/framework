<?php

namespace illustrate\Facades;

use Illuminate\Support\Facades\App;
use illustrate\Application;
use illustrate\Database\Database;
use illustrate\Database\SQL\Compiler;
use illustrate\Database\SQL\SQLStatement;

/**
 * Class Application Reactoor\illustrate
 * @author  ArshiaMohammadei <arshia8587@gmail.com>
 * @package illustrate\Facades
 */
class DB
{
	static function from(array|string $table)
	{
		Application::$app->database->from($table);
	}

	static function update(string $table)
	{
		Application::$app->database->update($table);
	}

	static function insert(array $table)
	{
		Application::$app->database->insert($table);
	}

	static function transaction(callable $query , $default = null)
	{
		Application::$app->database->transaction($query , $default);
	}

	static function query(string $sql , array $params)
	{
		Application::$app->database->getConnection()->query($sql , $params);
	}

	static function count(string $sql , array $params = [])
	{
		Application::$app->database->getConnection()->count($sql , $params);
	}

	static function column(string $sql , array $params = [])
	{
		Application::$app->database->getConnection()->column($sql , $params);
	}

	static function command(string $sql , array $params = [])
	{
		Application::$app->database->getConnection()->command($sql , $params);
	}

	static function initCommand(string $query , array $params = [])
	{
		Application::$app->database->getConnection()->initCommand($query , $params);
	}

	static function setDateFormat(string $format)
	{
		Application::$app->database->getConnection()->setDateFormat($format);
	}

	static function compiler()
	{
		Application::$app->database->getConnection()->getCompiler();
	}

	static function params(array $params)
	{
		Application::$app->database->getConnection()->getCompiler()->params($params);
	}

	static function delete(SQLStatement $delete)
	{
		Application::$app->database->getConnection()->getCompiler()->delete($delete);
	}


	static function select(SQLStatement $select)
	{
		Application::$app->database->getConnection()->getCompiler()->select($select);
	}
	static function quote(string $string)
	{
		Application::$app->database->getConnection()->getCompiler()->quote($string);
	}
}