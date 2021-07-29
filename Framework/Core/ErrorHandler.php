<?php
namespace Framework\Core;

class ErrorHandler 
{
	public function register()
	{
		set_exception_handler([$this, 'exceptionHandler']);
	}

	public function exceptionHander(\Exception $e)
	{
		$this->showError(get_class($e), $e->getMessage());
		return true;
	}
}