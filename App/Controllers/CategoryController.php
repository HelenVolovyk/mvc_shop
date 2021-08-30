<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use Framework\Core\AbsController;
use Framework\Core\AbsView;



class CategoryController extends AbsController
{
	public function index( )
	{
		$category = new Category();
		$categories = $category->getCategoriesList();
		
		AbsView::render('templates/category/index.php', 
		[ 'categories' => $categories ]);
	}

	public function show($id)
	{
		$category = new Category();
		$categories = $category->getCategoriesList();
	
		$category = $category->getCategoryById($id);
		$category_id = $category['id'];
		$category_name = $category['name'];
		
		$product = new Product();
      $products = $product->getProductsListByCategory($category_id);

		AbsView::render('templates/category/show.php', [
			'categories' => $categories, 
			'products' => $products, 
			'category_id' => $category_id,
			'category_name' => $category_name
			]);
	}
	 
}
  