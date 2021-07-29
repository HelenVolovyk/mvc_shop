<?php
//namespace Framework\Authentication;

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
	 
	 
	public function auth($login, $passwors)
	{
	  if ($login == $this->login && $passwors == $this->password) { 
			$_SESSION["isAuth"] = true; 
			$_SESSION["login"] = $login; 
			return true;
	  }
	  else { 
			$_SESSION["isAuth"] = false;
			return false; 
	  }
		
	}

	public function getLogin()
	{
		SessionHelpers::getUserData($Login);
	}

	public function logOut()
	{
		SessionHelpers::destroyUserData();
        redirect('home');
   
	}
}