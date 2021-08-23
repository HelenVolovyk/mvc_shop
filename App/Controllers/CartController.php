<?php
namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Framework\Core\AbsController;
use Framework\Core\AbsModel;
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
	public $productsCart = [];
	
	public function index()
	{
		AbsView::render('templates/cart/index.php');
	}
			

	
	public function add($id)
	{
		CommonCart::addProduct($id);
		redirect_back();
	}
	
    
    /**
     * @param integer $id
     */
    public function delete($id)
    {
		CommonCart::deleteProduct($id);
	   AbsView::render('templates/cart/index.php');
        
	 }

	 public function checkout()
    {
			 CommonCart::getProducts();
			 $user = new User();
			 $user = $user->getUserById(Session::getId());
			 AbsView::render('templates/cart/checkout.php', ['user' => $user]);
			  
			  
      //   $productsInCart = Cart::getProducts();

      //   $productsIds = array_keys($productsInCart);
      //   $products = Product::getProdustsByIds($productsIds);
      //   $totalPrice = Cart::getTotalPrice($products);
      
      //   $totalQuantity = Cart::countItems();

      //   $userName = false;
      //   $userPhone = false;
      //   $userComment = false;

      //   $result = false;

      //   if (!User::isGuest()) {
      //       $userId = User::checkLogged();
      //       $user = User::getUserById($userId);
      //       $userName = $user['name'];
      //   } else {
      //        $userId = false;
      //   }

      //      if (isset($_POST['submit'])) {
      //         $userName = $_POST['userName'];
      //       	$userPhone = $_POST['userPhone'];
      //       	$userComment = $_POST['userComment'];
      //       $errors = false;

      //       if (!User::checkName($userName)) {
      //           $errors[] = 'Неправильное имя';
      //       }
      //       if (!User::checkPhone($userPhone)) {
      //           $errors[] = 'Неправильный телефон';
      //       }

      //       if ($errors == false) {
      //           $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

      //           if ($result) {                       
      //               $adminEmail = 'php.start@mail.ru';
      //               $message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
      //               $subject = 'Новый заказ!';
      //               mail($adminEmail, $subject, $message);
      //               Cart::clear();
      //           }
      //       }
      //   }

      //   return true;
    }

}

	