<?php
namespace App\Controllers;

use Framework\Core\AbsController;
use Framework\Core\AbsView;


class ProductController extends AbsController{
	
	public function list(){
      
		AbsView::render('templates/shop/index.php');
	}

	
	public function show(){
      
		AbsView::render('templates/shop/product_show.php');
	}
}
  