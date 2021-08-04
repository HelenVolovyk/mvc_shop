<?php
namespace App\Controllers;

use Framework\Core\AbsController;
use Framework\Core\AbsView;


class HomeController extends AbsController{
	
	public function index(){

		AbsView::render('templates/home/index.php');
		
	}
}
  