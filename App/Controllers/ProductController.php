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
		$products= $product->getProductsList($limit, $offset);
	
	
		$total = $product->getTotalProducts();
		$pagination= new Pagination($total, $page, $limit, 'page-');

		// $products = json_encode($products);
		// echo $products;




//exit(json_encode($products));

AbsView::render('templates/shop/index.php', ['categories' => $categories, 'products' => $products,'pagination' => $pagination]);

// foreach($products as $product){
// 	printf(`
	
// 			<div class="card" style="width: 18rem;">
// 			<a class="cart__link" href="/product/show/%s">
// 		<div class="scale cart-img ">
// 			<img src="http://shop.com/images/%s" class="abg " alt="...">
// 		</div>
// 		</a>

// 		<div class="card-body mt-2">
// 			<h5 class="card-title">%s>
// 		</h5>
// 		<a href="#">category name</a>
// 		<p class="card-text">%s</p>
// 		<div class="price">

// 			<div class="printPrice">%s грн</div>
// 		</div>
// 		</div>
// 		</div>`,
// 		$product['id'] , $product['img'], $product['name'], $product['description'], $product['price']
// 	);
	
// }
// exit();
}

	public function ajax()
	{
		
		$page = intval($_GET['page']);
		$limit = $_GET['limit'];
		$search = $_GET['search'];
		$direction = $_GET['direction'];
		$sort = $_GET['sort'];
		
		$offset = $limit * ($page - 1);
		$product = new Product();
		$products = $product->getProductsList($limit, $offset, $sort, $direction, $search);
		$products = json_encode($products);
		echo $products;
		
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

		AbsView::render('templates/shop/priceUp.php', ['categories' => $categories, 'products' => $products, 'pagination' => $pagination]);
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

		AbsView::render('templates/shop/priceDown.php', ['categories' => $categories, 'products' => $products, 'pagination' =>	$pagination]);
	}


	public function show($id){

		$category = new Category();
		$categories = $category->getCategoriesList();
		$product = new Product();
		$product = $product->getProductById($id);

		AbsView::render('templates/shop/product_show.php', ['categories' => $categories, 'product' => $product] );
	}

	public function search($page=1)
	{
		$page = intval($page);
		$limit = 6;
		$offset = $limit * ($page - 1);

		//$searchg = $_GET['query'];

		$category = new Category();
		$categories = $category->getCategoriesList();
		$product = new Product();
		// $request = validate([
		// 'query' => 'required|min:3'
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

		AbsView::render('templates/shop/index.php', ['categories' => $categories, 'products' => $products, 'pagination' =>
		$pagination]
		);
	}

}