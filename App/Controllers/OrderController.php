<?php
namespace App\Controllers;

use App\Models\Order;
use Framework\Core\AbsController;
use App\Models\User;
use Framework\Core\AbsView;
use Framework\Session\Session;

class OrderController extends AbsController
{
	public function create()
	{
		$fields = filter_input_array(INPUT_POST, $_POST, 1);
		
		$user = new User();
		$user = $user->getUserById(Session::getId());
		
		$total= 0;
		foreach ($_SESSION['products'] as $product) {
			
			$total += $product['quantity'] * number_format($product['price'], 2) ;
		}
		
		$order = new Order();
		$fields['total'] = $total;

		$order = $order->save($fields); 
		
		Session::delete('products');	
		AbsView::render('templates/cart/thankyou.php', ['user' => $user, 'total' => $total]);
		
	}
}