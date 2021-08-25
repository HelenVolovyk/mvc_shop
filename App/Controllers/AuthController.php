<?php
namespace App\Controllers;

use App\Models\User;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Session\Session;

class AuthController extends AbsController
{
	public function login()
    {
		AbsView::render('auth/login.php');
    }
<<<<<<< HEAD

=======
>>>>>>> feature/auth
	 
   public function registration()
    {
      AbsView::render('auth/registration.php');
	 }
<<<<<<< HEAD

=======
>>>>>>> feature/auth
	 
	public function auth()
	 {
		unset($_SESSION['error']['login']['common']);

		$fields = filter_input_array(INPUT_POST, $_POST, 1);
		$user = new User();
		
		if ($userData = $user->getUserByEmail($fields['email'])){

			if(password_verify($fields['pass'], $userData['pass'])){
				Session::setName($userData['name']);
				Session::setId($userData['id']);
				AbsView::site_redirect('/');
			} else{
				$_SESSION['error']['login']['common'] = 'Data is not correct';
				redirect_back();
			} 
		} else {
<<<<<<< HEAD
			$_SESSION['error']['login']['common'] = 'Data is not correct';
=======
			$SESSION['error']['login']['common'] = 'Data is not correct';
>>>>>>> feature/auth
			redirect_back();
		}
	 }
	 
	public function logout()
    {
      Session::destroy();
		AbsView::site_redirect('/');
    }
	
}