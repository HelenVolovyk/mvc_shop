<?php
namespace Framework\Router;

use ErrorException;
use Exception;

/**
 * Класс Router
 *
*/
class Router
{

    /**
	  *   @var array 
     */
    private $routes;
	 public $controller;
	 public $controllerName;
	 public $actionName;
	 public $parameters=[];

    public function __construct()
    {
        $routesPath =  'routes.php';
        $this->routes = include($routesPath);
    }

  
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

  
    public function run()
    {
		  $uri = $this->getURI();
	
        foreach ($this->routes as $uriPattern => $path) {
    
            if (preg_match("~$uriPattern~", $uri)) {
					
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

					 $segments = explode('/', $internalRoute);
										 
                $controllerName =  array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
				
                $this->actionName =   ucfirst(array_shift($segments));
					 $this->parameters = $segments;
					
					 if (class_exists("App\\Controllers\\" . $controllerName)){
						
						$this->controller = "App\\Controllers\\" . $controllerName;
				
					 } 
												             
				} 
				
							
        }  	
    }
}

		