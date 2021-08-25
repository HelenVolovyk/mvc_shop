<?php
namespace App\Controllers;

use App\Models\Order;
use Framework\Core\AbsController;
use App\Models\User;
use Framework\Core\AbsView;
use Framework\Session\Session;
<<<<<<< HEAD
=======
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
>>>>>>> feature/auth

class OrderController extends AbsController
{
	public function create()
	{
		$fields = filter_input_array(INPUT_POST, $_POST, 1);
		
		$user = new User();
		$user = $user->getUserById(Session::getId());
		
		$total= 0;
		foreach ($_SESSION['products'] as $product) {
<<<<<<< HEAD
			
=======
>>>>>>> feature/auth
			$total += $product['quantity'] * number_format($product['price'], 2) ;
		}
		
		$order = new Order();
		$fields['total'] = $total;

		$order = $order->save($fields); 
		
<<<<<<< HEAD
		Session::delete('products');	
		AbsView::render('templates/cart/thankyou.php', ['user' => $user, 'total' => $total]);
=======
		$logger = new Logger('INFO LOGGER');
		$logger->pushHandler(new  StreamHandler(ROOT_PATH . '/Framework/Logger/info/log', Logger::INFO));
		$logger->info('new ORDER registered', ['total' => $total, 'time' => date('H:i:s d.m.Y')]);
		
		Session::delete('products');	

		AbsView::render('templates/cart/thankyou.php', ['total' => $total, 'user' => $user]);
>>>>>>> feature/auth
		
	}
}