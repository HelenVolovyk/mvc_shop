<?php
namespace Framework\Core\Common;

use App\Models\Product;
use Framework\Session\Session;

class Cart 
{
	public static function addProduct(int $id)
   {
		if (empty($_SESSION['products']) ) {
			$_SESSION['products'] = [];
		}
		
		$isUpdate = false;
		
			foreach($_SESSION['products'] as $index => $product){
				if($product['id'] == $id){
					$_SESSION['products'][$index]['quantity'] +=1;
					 $isUpdate = true;
				}
			}
				
			if(!$isUpdate) {
			$productModel = new Product();
			$product = $productModel->getProductById($id); 
			$product['quantity'] = 1;
			
			array_push( $_SESSION['products'], $product);			
			}
	
			return self::countItems();		
   }

    /**
     * @return int 
     */
   public static function countItems()
    {
	   if (isset($_SESSION['products'])) {		
			return count($_SESSION['products']);
		} else {
			return 0;
		}
 }
    
	public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

   
   	/**
	 * @param integer $id <p>id товара</p>
	 */
	public static function deleteProduct($id)
	{
		foreach($_SESSION['products'] as $index => $product){
			if($product['id'] == $id){
				unset($_SESSION['products'][$index]);
			}
		}
	}
}