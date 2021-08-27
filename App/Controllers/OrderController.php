<?php
namespace App\Controllers;

use App\Models\Order;
use Framework\Core\AbsController;
use App\Models\User;
use Framework\Core\AbsView;
use Framework\Session\Session;
use Mailer\Transport\Message;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class OrderController extends AbsController
{
	public $total;
	
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
	
		$id = $order->save($fields); 

		$order = $order->getOrderById($id); 
	

		$logger = new Logger('INFO LOGGER');
		$logger->pushHandler(new  StreamHandler(ROOT_PATH . '/Framework/Logger/info/log', Logger::INFO));
		$logger->info('new ORDER registered', ['total' => $total, 'time' => date('H:i:s d.m.Y')]);
		
		
		$subject = 'new order';
		$templateName = 'confirmOfPurchase';
		$vars = [
			'number' => $order['id'],
			'address' => $order['address'],
			'data' => $order['created_at'],
			'total' => $order['total']
			];
		$to = 'mr0778240@gmail.com';	

		Message::send( $subject, $templateName, $vars, $to);
		
		Session::delete('products');	

		AbsView::render('templates/cart/thankyou.php', ['total' => $total, 'user' => $user, 'id' => $id]);
		
	}


	
}