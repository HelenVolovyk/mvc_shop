<?php
namespace Framework\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;


class LogStreamer
{
	protected static $instance;

	/**
	 * Method to return the Monolog instance
	 *
	 * @return \Monolog\Logger
	 */
	static public function getLogger()
	{
		if (! self::$instance) {
			self::configureInstance();
		}
		return self::$instance;
	}

	/**
	 * Configure Monolog to use a rotating files system.
	 *
	 * @return Logger
	 */
	protected static function configureInstance()
	{
		$dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'log';
		if (!file_exists($dir)){
			mkdir($dir, 0777, true);
		}

		$logger = new Logger('Manager');
		$logger->pushHandler(new  StreamHandler($dir . DIRECTORY_SEPARATOR . 'main.log', 5));
	
		self::$instance = $logger;
	}

	public static function debug($message, array $context = []){
		self::getLogger()->addDebug($message, $context);
	}

	public static function info($message, array $context = []){

		self::getLogger()->addInfo($message, $context);
	}

	public static function warning($message, array $context = []){
		self::getLogger()->addWarning($message, $context);
	}

	public static function error($message, array $context = []){
		self::getLogger()->addError($message, $context);
	}

	
	
}

	