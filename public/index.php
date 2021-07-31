<?php
/**
 * Error reporting
 */

use Framework\Core\AbsModel;
use Framework\Router\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Подключение файлов системы
require_once dirname(__DIR__) .'/vendor/autoload.php';
require_once dirname(__DIR__) . '/Const/const.php';
require_once dirname(__DIR__) . '/Framework/Core/Common/function.php';

session_start();



// Вызов Router

 try{
	$router = new Router; 
	$router->run();

	if( $controller = $router->controller){
		 $controller = new $controller;
	}
	else {
		throw new \Exception("Controller $controller not found.");
	 }
	  
	  $action = $router->actionName;
	  $parameters = $router->parameters;

	 call_user_func_array([$controller, $action], $parameters);
	
  } catch (Exception $e){
	
	echo '<pre>Message:'.$e->getMessage().'</pre>';
	echo '<pre>File: '.$e->getFile().'</pre>';
	echo '<pre>Line: '.$e->getLine().'</pre>';
}

$absModel = new AbsModel();