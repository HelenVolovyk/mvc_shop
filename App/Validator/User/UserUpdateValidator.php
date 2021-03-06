<?php
namespace App\Validator\User;

use App\Models\User;
use Framework\Core\AbsValidator;

class UserUpdateValidator extends AbsValidator
{
    protected $errors = [
      'name_error'  => 'Имя должно содержать минимум 2 символа',
      'email_error' => 'Почта не корректная'
    ];

    protected $rules = [
      'name'  => '/[A-Za-zА-Яа-я]{2,}/',
      'email' => '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/'
    ];

    protected $errors_pass = [
        'new_pass_error' => 'Пароль должен содержать минимум 8 символов'
    ];

    protected $rules_pass = [
        'pass_new' => '/[a-zA-Z0-9]{5,}/'
    ];

   public function checkUserEmail(string $email, int $id)
   {
     $user = new User();
       if(!$user->getUserEmailExeptThisUser($email, $id)){
         $this->errors = [
            'email_error' => 'Пользователь с такой почтой уже существует'
         ];
         return true;
       }

      return false;
    }

	public function validate(array $request)
	{
     unset($request['old_pass'], $request['new_pass'], $request['id']);

      foreach ($request as $key => $field){
         if(preg_match($this->rules[$key], $field)) {
                unset($this->errors["{$key}_error"]);
         }
      }

     return empty($this->errors) ? true : false;
   }

	public function validate_pass(string $pass)
	{
     if(preg_match($this->rules_pass['pass_new'], $pass)) {
            unset($this->errors_pass["new_pass_error"]);
      }

     return empty($this->errors_pass) ? true : false;
   }

   public function getErrors_pass()
   {
     return $this->errors_pass;
   }


}