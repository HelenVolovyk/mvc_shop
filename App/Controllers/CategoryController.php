<?php
namespace App\Controllers;

use App\Models\Category;
use Framework\Core\AbsController;
use Framework\Core\AbsView;



class CategoryController extends AbsController{
	

	
	public function index( ){
      	
		$categories = new Category();
		$categories = $categories->getContent();
				
		AbsView::render('Templates/category/index.php', 
		['title' => 'Categories', 'categories' => $categories ]);
		
	}
}
  