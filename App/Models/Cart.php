<?php
namespace App\Models;

use Framework\Core\AbsModel;

class Cart extends AbsModel
{

	 /**
     * @param  $productIncart
     * @var array
     *
     *
     */
	 public $productsInCart;
	 
	public static function addProduct($id)
	{
				
		if (isset($_SESSION['products'])) {
			 $productsInCart = $_SESSION['products'];
		}
  
		if (array_key_exists($id, $productsInCart)) {
					 $productsInCart[$id] ++;
		} else {
					 $productsInCart[$id] = 1;
		}
 
		$_SESSION['products'] = $productsInCart;
 
		return self::countItems();
		
	}

	


/**
 * Подсчет количество товаров в корзине (в сессии)
 * @return int <p>Количество товаров в корзине</p>
 */
	// public static function countItems()
	// {
		
	// 	 if (isset($_SESSION['cart'])) {
	// 			  $count = 0;
	// 		  foreach ($_SESSION['cart'] as $id => $quantity) {
	// 				$count = $count + $quantity;
	// 		  }
	// 		  return $count;
	// 	 } else {
			
	// 		  return 0;
	// 	 }
	// }

	/**
	 * Возвращает массив с идентификаторами и количеством товаров в корзине<br/>
	 * Если товаров нет, возвращает false;
	 * @return mixed: boolean or array
	 */
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
	public static function getTotalPrice($products)
	{
		$productsInCart = self::getProducts();
		
		$total = 0;
		//  if ($productsInCart) {
		
		// 	  foreach ($products as $item) {
		// 				$total += $item['price'] * $productsInCart[$item['id']];
		// 	  }
		//  }

		return $total;
	}

	/**
	 * Очищает корзину
	 */
	public static function clear()
	{
		if (isset($_SESSION['products'])) {
			unset($_SESSION['products']);
		}
	}

	/**
	 * Удаляет товар с указанным id из корзины
	 * @param integer $id <p>id товара</p>
	 */
	public static function deleteProduct($id)
	{
		$productsInCart = self::getProducts();
		unset($productsInCart[$id]);

		$_SESSION['products'] = $productsInCart;
	}

}