<?php
namespace App\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Core\Common\Cart as CommonCart;
use Framework\Session\Session;

/**
     * @param  $productIncart
     * @var array
     *
     * @property array  $productIncart
     */
	
	 
class CartController extends AbsController
{

	public function index()
	{
		
		foreach($_SESSION['products'] as $k=>$v){
			$id = $k;
			$quantity = $v;
		}

		$id = array_keys($_SESSION['products']);
		
		$idsString = implode(',', $id);

		$product = new Product();
		$products = $product->getProdustsByIds($idsString);

   	foreach($products as $product){
				
			$update = [
				'id'		=> $product['id'],
				'name' 	=> $product['name'],
				'price' 	=> $product['price'],
				'count' 	=> $quantity   
			];		
				
			$product = $update;
			$productsCart[] = $product;
							
		}
		
		$item_price = number_format($product['price'] * $update['count'], 2);
		//$total = CommonCart::getTotalPrice($productsCart);
		$total = 0;
		
		AbsView::render('templates/cart/index.php', ['productsCart' => $productsCart, 'update' => $update, 'total' => $total, 'item_price' => $item_price]);
	}
			

	public function add($id)
	{
		CommonCart::addProduct($id);
		//CommonCart::countItems();
		redirect_back();
	}
	
	
	 /**
     * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
     * @param integer 
     */
    public function AddAjax($id)
    {
      echo Cart::addProduct($id);
      return true;
	 }
	 


    
    /**
     * @param integer $id <p>id товара</p>
     */
    public function delete($id)
    {
		$productModel = new Product();
		$product = $productModel->getProductById( $id);
				
			if ($id) {
				foreach ($_SESSION['products'] as $key => $value){
				  if ($key == $id){
						unset($_SESSION['products']);
						echo '<script>alert("Product has been Removed...!")</script>';
					}
				 }
			 }

	  AbsView::render('templates/cart/index.php', ['product' => $product]);
        
    }
	  
}