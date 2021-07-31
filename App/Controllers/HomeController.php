<?php
namespace App\Controllers;

use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Core\View;

class HomeController extends AbsController{
	
	public function index(){

		AbsView::render('templates/home/index.php');
		
	}
}
  