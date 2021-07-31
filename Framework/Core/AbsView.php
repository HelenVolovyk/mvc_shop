<?php
namespace Framework\Core;


class AbsView
{
    protected static $viewPath =  '/App/Views/';
   

    public static function render ($view, $args = []){
		  extract($args, EXTR_SKIP); 
	
		  $file = ROOT_PATH . static::$viewPath . $view;
		 
		
		        if (file_exists($file)){
			 
			require $file;
			}	else {
            throw new \Exception("$file not found.");
		  }

		  
		 
	 }

	 public static function site_redirect($path = '')
	{
		
		header('Location:' . $path);
		exit;
	}
	 
   

}