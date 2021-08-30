<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use Framework\Core\AbsController;
use Framework\Core\AbsView;


class ProductController extends AbsController
{
	public function list($page=1)
	{
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);
		
		$category = new Category();
		$categories = $category->getCategoriesList();

		$product = new Product();
		$products= $product->getProductsList($limit, $offset);
				
		$total = $product->getTotalProducts();
	
		AbsView::render('templates/shop/index.php', [
			'categories' => $categories, 
			'products' => $products,
		]);
	}

	public function ajax()
	{
		$offset = 0;
		$limit = $_GET['limit'];
		$search = $_GET['search'];
		$direction = $_GET['direction'];
		$sort = $_GET['sort'];
		$result = [];	
		
		$product = new Product();
		$products = $product->getProductsList($limit, $offset, $sort, $direction, $search);

		$count = $product->getTotalProducts();		
		$result['data'] = $products;
		$result['count'] = $count;
		$result = json_encode($result);
		echo $result;
	}  


	public function priceUp($page=1)
	{
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);

		$category = new Category();
		$categories = $category->getCategoriesList();

		$product = new Product();
		$products= $product->getProductsListByPriceUp($page, $limit, $offset);

		$total = $product->getTotalProducts();
		

		AbsView::render('templates/shop/priceUp.php', [
			'categories' => $categories, 
			'products' => $products, 
		]);
	}

	public function priceDown($page=1)
	{
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);

		$category = new Category();
		$categories = $category->getCategoriesList();

		$product = new Product();
		$products= $product->getProductsListByPriceDown($page, $limit, $offset);

		$total = $product->getTotalProducts();
		
		AbsView::render('templates/shop/priceDown.php', [
			'categories' => $categories, 
			'products' => $products, 
		]);
	}


	public function show($id)
	{
		$category = new Category();
		$categories = $category->getCategoriesList();
		$product = new Product();
		$product = $product->getProductById($id);
		$category = $category->getCategoryById($product['category_id']); 
		
		AbsView::render('templates/shop/product_show.php', [
			'categories' => $categories, 
			'category' => $category, 
			'product' => $product
			] );
	}

	public function search($page=1)
	{
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);

		$category = new Category();
		$categories = $category->getCategoriesList();
		$product = new Product();
	
		$searchg =$_GET['query'];
		$searchg = preg_replace("#[^0-9a-z]#i", "", $searchg);
		$products = $product->searchProductsName($searchg, $page, $limit, $offset);
		$total = $product->getTotalProducts();
	
		if($products === false){
		echo "There was no search result";
		die;
		}

		AbsView::render('templates/shop/index.php', [
			'categories' => $categories, 
			'products' => $products, 
		]);
	}

}