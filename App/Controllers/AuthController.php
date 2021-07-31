<?php
namespace App\Controllers;

use App\Models\User;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Helpers\SessionHelpers;

class AuthController extends AbsController
{

	public function login()
    {
		
      AbsView::render('auth/login.php');
    }

   public function registration()
    {
      AbsView::render('auth/registration.php');
	 }


	 public function isAuth()
	 {
		 SessionHelpers::isUserLogin();
	 }
	 
	 
	public function auth()
	{
	
		// unset($_SESSION['error']['login']['common']);
		$fields = filter_input_array(INPUT_POST, $_POST, 1);

		$user = new User();
		
		if ($userData = $user->getUserByEmail($fields['email'])){

			if(password_verify($fields['pass'], $userData['pass'])){
							
				SessionHelpers::setUserData('id', $userData['id']);
				AbsView::site_redirect('/home');
				} 
		} else{
		
		$_SESSION['error']['login']['common'] = 'Data is not correct';
		
		}

	AbsView::site_redirect('/login');


 }
	
	
	public function getLogin()
	{
		SessionHelpers::getUserData($Login);
	}

	public function logOut()
	{
		SessionHelpers::destroyUserData();
		AbsView::site_redirect('home');
   
	}
}