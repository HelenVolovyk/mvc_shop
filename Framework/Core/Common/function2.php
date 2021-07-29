<?php

class Template
{
//   public $layout;
//   public $title;
//   public $params;
//   public $template;
  
  
// 	public function __construct($template)
// 	{
// 		$template = '';
// 	   if (!file_exists( $template )){
// 			die('unable to locate file');
// 		} 
// 	  $this->template = $template;
// 			}
	
	  
// 	public function  set($params, $title, $layout){
// 		$this->title = $title;
// 	 	$this->params[] = $params;
// 	 	$this->layout = $layout;
// 	}

// 	public function renderHTML() {
// 	  $template = file_get_contents( $this->$template );
	  
// 	  foreach( $params as $key => $value ) {
// 		$this->params[$key] = $value;
//   }
	  
// 	  	  echo $template;
// 	}


	function site_redirect($path = '')
	{
	header ("Location" . SITE_URL . "/" . $path);
	exit;
	}
}





	  //  if(is_file($template)){
	  // 	ob_start();
	  // 	include($template);
	  // 	return ob_get_clean();
	  //  }
	  //  return false;
	  //ob_start();