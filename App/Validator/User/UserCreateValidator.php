<?php
namespace App\Validator\User;

use App\Models\User;
use Framework\Core\AbsValidator;

class UserCreateValidator extends AbsValidator
{
protected $errors = [
'name_error' => 'Имя должно содержать минимум 2 символа',
'email_error' => 'Почта не корректная',
'pass_error' => 'Пароль должнен содержать минимум 8 символов'
];

protected $rules = [
'name' => '/[A-Za-zА-Яа-я]{2,}/',
'email' =>
'/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/',
'pass' => '/[a-zA-Z0-9]{5,}/'
];


public function storeValidate(array $fields)
{
	foreach ($fields as $key => $field){
		if(preg_match($this->rules[$key], $field)){
			unset($this->errors["{$key}_error"]);
		} 
	}
	return empty($this->errors) ? true : false;
}

public function checkEmailOnExist(string $email)
{
	$user = new User();
		if($user->getUserByEmail($email)){
		$this->errors = [
		'email_error' => 'Пользователь с такой почтой уже существует'
		];
		return true;
		}

	return false;
	}

	public function getErrors()
	{
		return $this->errors;
	}
}