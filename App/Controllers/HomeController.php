<?php
namespace App\Controllers;

use Framework\Core\AbsController;

use Framework\Core\View;

class HomeController extends AbsController{
	
	public function index(){
      
		//View::render('home/index.php');
		echo 'hi';
	}
}
  