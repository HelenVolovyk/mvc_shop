<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use Framework\Core\AbsController;
use Framework\Core\AbsView;


class ProductController extends AbsController{
	
	
	public function list($page=1){
		//echo $page;
		$category = new Category();
		$categories = $category->getCategoriesList();
	
		$product = new Product();
		$products= $product->getProductsList($page);
	
		AbsView::render('templates/shop/index.php', ['categories' => $categories, 'products' => $products] 
							);
	}

	
	public function show($id){
		$category = new Category();
		$categories =  $category->getCategoriesList();
		$product = new Product();
		$product = $product->getProductById($id);
		
		AbsView::render('templates/shop/product_show.php', ['categories' => $categories, 'product' => $product] );
	}




	
}
  