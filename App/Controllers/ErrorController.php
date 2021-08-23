<?php
namespace App\Controllers;

use Framework\Core\AbsController;

class ErrorController extends AbsController
{

    public function error404(){
        return __CLASS__ . 'error404';
	 }
	 
	 public function notFound(){
		return __CLASS__ . ' not found';
  	}
}