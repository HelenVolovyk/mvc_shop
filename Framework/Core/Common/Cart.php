<?php
namespace Framework\Core\Common;

use App\Models\Product;
use Framework\Session\Session;

class Cart 
{
	public static function addProduct($id)
    {

// Session::destroy();
          // Приводим $id к типу integer
			 $id = intval($id);

			 // Пустой массив для товаров в корзине
			 $productsInCart = array();
//   $_SESSION['products'] = $_POST;
			 // Если в корзине уже есть товары (они хранятся в сессии)
			 if (isset($_SESSION['products'])) {
				//var_dump($_SESSION['products']);
				  // То заполним наш массив товарами
				  $productsInCart = $_SESSION['products'];
			 }
  //var_dump($productsInCart);
//   var_dump($id);
			 // Проверяем есть ли уже такой товар в корзине 
			 if (array_key_exists($id, $productsInCart)) {
				  // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
				  $productsInCart[$id] ++;
			 } else {
				  // Если нет, добавляем id нового товара в корзину с количеством 1
				  $productsInCart[$id] = 1;
			 }
  
			 // Записываем массив с товарами в сессию
			 $_SESSION['products'] = $productsInCart;
		//	var_dump($productsInCart);
  
			 // Возвращаем количество товаров в корзине
			 return self::countItems();
			 return $productsInCart; 
			
		  
    }

    /**
     * Подсчет количество товаров в корзине (в сессии)
     * @return int <p>Количество товаров в корзине</p>
     */
    public static function countItems()
    {
		// var_dump($_POST);
		//$_SESSION['products'] = $_POST;
        if (isset($_SESSION['products'])) {
	
			$count = 0;
			foreach ($_SESSION['products'] as $id => $quantity) {
			
				
				// var_dump($_SESSION['products']);
				 $count = $count + $quantity;
			}
		
			return $count;
			//var_dump($count);
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
     * Получаем общую стоимость переданных товаров
     * @param array $products <p>Массив с информацией о товарах</p>
     * @return integer <p>Общая стоимость</p>
     */
    public static function getTotalPrice($productsCart)
    {
        
        $total = 0;
        if ($productsCart) {
         
            foreach ($productsCart as $product) {
					$update = [
						'id'		=> $product['id'],
						'name' 	=> $product['name'],
						'price' 	=> $product['price'],
						'count' 	=> $quantity   
					];	
				
					$subtotal = number_format($product['price'] * $update['count'], 2);
                $total += 	$subtotal;
            }
        }

        return $total;
    }
}