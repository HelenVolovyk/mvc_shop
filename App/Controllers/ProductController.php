<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Core\Common\Pagination;

class ProductController extends AbsController
{
	public function list($page=1){

		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);
		
		$category = new Category();
		$categories = $category->getCategoriesList();

		$product = new Product();
		$products= $product->getProductsList($page, $limit, $offset);
	
		$total = $product->getTotalProducts();
		$pagination= new Pagination($total, $page, $limit, 'page-');

		AbsView::render('templates/shop/index.php', ['categories' => $categories, 'products' => $products, 'pagination' => $pagination] 
		 );
	}
	
	public function priceUp($page=1){
		
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);
		
		$category = new Category();
		$categories = $category->getCategoriesList();
	
		$product = new Product();
		$products= $product->getProductsListByPriceUp($page, $limit, $offset);
		
		$total = $product->getTotalProducts();
		$pagination= new Pagination($total, $page, $limit, 'page-');
		
		AbsView::render('templates/shop/priceUp.php', ['categories' => $categories, 'products' => $products, 'pagination' => $pagination] 
		);
	}
	
	public function priceDown($page=1){
		
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);
		
		$category = new Category();
		$categories = $category->getCategoriesList();
		
		$product = new Product();
		$products= $product->getProductsListByPriceDown($page, $limit, $offset);
		
		$total = $product->getTotalProducts();
		$pagination= new Pagination($total, $page, $limit, 'page-');
		
		AbsView::render('templates/shop/priceDown.php', ['categories' => $categories, 'products' => $products, 'pagination' => $pagination] 
		);
	}

	
	public function show($id){
		
		$category = new Category();
		$categories =  $category->getCategoriesList();
		$product = new Product();
		$product = $product->getProductById($id);
		
		AbsView::render('templates/shop/product_show.php', ['categories' => $categories, 'product' => $product] );
	}

	public function search($page=1)
	{
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);			

		$searchg = $_GET['query'];

		$category = new Category();
		$categories = $category->getCategoriesList();
		$product = new Product();
		// $request = validate([
		// 	'query' => 'required|min:3'
		// ]);
		$searchg =$_GET['query'];
		$searchg = preg_replace("#[^0-9a-z]#i", "", $searchg);
		$products = $product->searchProductsName($searchg, $page, $limit, $offset);
		$total = $product->getTotalProducts();
		$pagination= new Pagination($total, $page, $limit, 'page-');
			
		if($products === false){
		echo "There was no search result";
		die;
		}

		AbsView::render('templates/shop/index.php', ['categories' => $categories, 'products' => $products,  'pagination' => $pagination]
		);
	}

}