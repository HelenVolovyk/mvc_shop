<?php
namespace App\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Framework\Core\AbsController;
use Framework\Core\AbsView;

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
		
		 $productIncart = false;	
		 $productsInCart = Cart::getProducts();
		
				  if ($productsInCart) {
					
						//*$productsIds = array_keys($productsInCart);
						
						//  var_dump($productsIds);
						//  print_r( implode(',', $productsIds));
						$products = new Product();
						$products->getProdustsByIds($productsIds);
					
						$totalPrice = Cart::getTotalPrice($products);
				  }

		
		AbsView::render('templates/cart/index.php');
	}

	public function add($id)
	{

	
		Cart::addProduct($id);
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
     * Action для добавления товара в корзину синхронным запросом
     * @param integer $id <p>id товара</p>
     */
    public function Delete($id)
    {
        Cart::deleteProduct($id);
        
        header("Location: /cart");
    }

  

}