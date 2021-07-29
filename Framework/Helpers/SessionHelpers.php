<?php
namespace Framework\Helpers;;

class SessionHelpers
{
   public static function isUserLogin(){
		if (isset($_SESSION['user_data'])) {
        return $_SESSION['user_data'];
		} else {
			return false;
		}
	}

    public static function getUserId(){
        return $_SESSION['user_data']['id'];
    }

    public static function setUserData($key, $value){
		$_SESSION['user_data'][$key] = $value;
  }

    public static function getUserData($key){
		if (isset($_SESSION['user_data'])) {
        return $_SESSION['user_data'][$key];
	 }
	}

    public static function destroyUserData(){
        session_destroy();
    }
}