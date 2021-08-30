<?php
namespace Framework\Session;

class  Session{
	
	
  public static function setName($name): void
  {
    $_SESSION['user_data']['name'] = $name;
  }
 
	
  public static function getName(): string
  {
	  if (!empty($_SESSION['user_data']['name'])) {
	    return $_SESSION['user_data']['name'];
	  }
	    return "Session does not have the name";
  }

	
  public static function setId($id): void
  {
    $_SESSION['user_data']['id'] = $id;
  }

	
  public static function getId(): string
  {
    if (!empty($_SESSION['user_data']['id'])) {
      return $_SESSION['user_data']['id'];
	 }
	   return "Session does not have id";
	}


  public static function cookieExists(): bool
  {
    return isset($_COOKIE);
  }
	
  public static function sessionExists(): bool
  {
    return isset($_SESSION);
  }
	

  public static function start(): bool 
  {
    return session_start();
  }	  
	
  public static function destroy(): void 
  {
    session_destroy();
  }
	
  public static function setSavePath($savePath): void  
  {
    session_save_path($savePath);
  }
	
	 
  public  static function set($key, $value) :void
  {
    $_SESSION['user_data'][$key] = $value;
  }
	
  public static function get($key) 
  {
    if (!empty($_SESSION['user_data'][$key])) {
	   return $_SESSION['user_data'][$key];
	 }
	   return [];
  }
	
  public static  function contains($key): bool
  {
    return array_key_exists($key, $_SESSION);
  }
	
	
  public  static function delete($key): void
  {
    if (!empty($_SESSION[$key])) {
	    unset($_SESSION[$key]);
    }
  }
  
  public static function isUserLogin()
  {
    return !empty($_SESSION['user_data']);
  }
}