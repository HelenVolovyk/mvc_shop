<?php
namespace Framework\Authentication;

use App\Models\User;
use Framework\Session\Session;

class Authentication
{
	public static function isAuth(): bool
	{
	  if (isset($_SESSION['user_data'])) {
	    return true;
	  } else {
	    return false;
	  }
	}
	 
   public function auth($login, $password): bool
	{
	  $user = new User();
	  $userData = $user->getUserByEmail($login);
	    if (!!$userData && password_verify($password, $userData['pass'])) { 
		  Session::setName($userData['name']);
		  Session::setId($userData['id']);
		  return true;
	    } else { 
		  Session::delete('user_data');
		  return false; 
	    }
	}

	public function getLogin()
	{
	  $fields = filter_input_array(INPUT_POST, $_POST, 1);
	  $isLogin = $this->auth($fields['email'], $fields['pass']);		
	  return $isLogin ?? 'Data is not correct';
	}

	public function logOut(): void
	{
     Session::delete('user_data');
	}
}