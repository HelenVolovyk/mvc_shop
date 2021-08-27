<?php
namespace App\Controllers;

use App\Models\User;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Core\Common\Cart as CommonCart;
use Framework\Session\Session;

 
class CartController extends AbsController
{
	public function index(){
		AbsView::render('templates/cart/index.php');
	}
			
	public function add($id){
		if(Session::isUserLogin()){
			CommonCart::addProduct($id);
			$_SESSION['error']['login']['common'] = 'The product was added';
		} else {
			$_SESSION['error']['login']['common'] = 'Please register';
			AbsView::site_redirect('login');
		}
	
		redirect_back();
	}
	
    /**
     * @param integer $id
     */
   public function delete($id){
		CommonCart::deleteProduct($id);
		$_SESSION['error']['login']['common'] = 'The product was removed';
	   AbsView::render('templates/cart/index.php');
        
	}

	public function checkout(){
		
		 CommonCart::getProducts();
		 $user = new User();
		// var_dump($_SESSION);
		 $user = $user->getUserById(Session::getId());
		 AbsView::render('templates/cart/checkout.php', ['user' => $user]);						  
	}
}

	