<?php
namespace App\Controllers;

use Framework\Core\AbsController;
use Framework\Core\AbsView;


class PageController extends AbsController{
	
	public function about(){
      	
		AbsView::render('templates/pages/about.php');
	}
	
	public function contact(){
      	
		AbsView::render('templates/pages/contact.php');
	}
	
	public function news(){
      	
		AbsView::render('templates/pages/news.php');
	}
	
	public function payment(){
      	
		AbsView::render('templates/pages/payment.php');
	}
	

}
 