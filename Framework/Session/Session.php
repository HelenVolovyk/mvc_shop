<?php
namespace Framework\Session;

class Session{
	
	
	public function setName($name)
  {
		$_SESSION[$name] = $name;
  }
 
	
	public function getName()
	{
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
	  }
	  return $_SESSION[$name];
	}

	
	public function setId($id)
	{
		$_SESSION[$id] = $id;
	}

	
	public function getId()
	{
		return session_id();
	}

	
	public function cookieExists()
	{
		if($_COOKIE !== null) {
			return true;
		}else{
			return false;
		}
	  
}
	
	public function sessionExists()
	{
		if($_SESSION !== null) {
			return true;
		}else{
			return false;
		}
	}
	
	public function start()
	{
		session_start();
	}
	
	public function destroy()
	{
		session_destroy();
	}
	
	public function setSavePath($savePath)
	{
		session_save_path();
	}
	
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;
		return $this;
	}
	
	public function get($key)
	{
		if ($this->has($key)) {
			return $_SESSION[$key];
	  }
	  return null;
	}
	
	public function contains($key)
	{
		if(array_key_exists('key', $key)){
			return true;
		}
	}
	
	public function delete($key)
	{
		if ($this->has($key)) {
			unset($_SESSION[$key]);
	  }
	}
}