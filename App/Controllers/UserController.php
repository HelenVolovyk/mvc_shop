<?php
namespace App\Controllers;

use App\Logger\LogStreamer;
use App\Models\User;
use App\Validator\User\UserCreateVaidate;
use App\Validator\User\UserCreateValidate;
use App\Validator\User\UserCreateValidator;
use App\Validator\User\UserUpdateVaidate;
use App\Validator\User\UserUpdateValidate;
use App\Validator\User\UserUpdateValidator;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Helpers\SessionHelpers;
use SessionHandler;

class UserController extends AbsController
{
	
		public function store ()
	{
		
		 $fields = filter_input_array(INPUT_POST, $_POST, 1);
	
		 $userValidate = new UserCreateValidator();

		 if ($userValidate->storeValidate($fields) && !$userValidate->checkEmailOnExist($fields['email'])){
			
			  $user = new User();
			  $newUser = $user->create($fields);
			 
			  
			  if($newUser){
				
				  AbsView::site_redirect('/login');
				  LogStreamer::info('new user registered', ['user' => $newUser['name']]);
				  
			  } else {
				  die("500 - Ooops, smth went wrong "); 
			  }      

		 }
		 $this->data['data'] = $fields;
		 $this->data += $userValidate->getErrors();

		AbsView::render('auth/registration.php', $this->data);
	}

	public function index (){
		 $user = new User();

		 $this->data['data'] = $user->getUserById($_SESSION['user_data']['id']);
		 AbsView::render('user/edit.php', $this->data);
	}

	public function edit(){
		 $fields = filter_input_array(INPUT_POST, $_POST, 1);
		 $fields['id'] = $_SESSION['user_data']['id'];

		 $user = new User();
		 $userValidate = new UserUpdateValidator();

		 if ($userValidate->validate($fields) && !$userValidate->checkUserEmail($fields['email'], $fields['id'])){
			 
			  if ($fields['old_pass'] != ''){
					$userData = $user->getUserById($fields['id']);
				
				
					if(password_verify($fields['old_pass'], $userData['pass'])){
		
						 if($userValidate->validate_pass($fields['new_pass'])){
							  unset($fields['old_pass']);
							 	
						 } else {
							  $this->data['data'] = $user->getUserById($_SESSION['user_data']['id']);
							  $this->data += $userValidate->getErrors_pass();

							  AbsView::render('user/edit.php', $this->data);
							  exit();
						 }
					} else {
						 $_SESSION['notification'] = [
							  'type' => 'danger',
							  'message' => 'Не верный пароль'
						 ];
						 AbsView::site_redirect('user/index');
					}

			  } else {
				var_dump(222); 
					unset($fields['old_pass'], $fields['new_pass']);
			  }
			  $user->update($fields);

			  $_SESSION['notification'] = [
					'type' => 'success',
					'message' => 'Данные изменены!'
			  ];
			  SessionHelpers::setUserData('name', ' ' . $fields['name']);

			  AbsView::site_redirect('home');
			  exit();
		 }
		 $this->data['data'] = $user->getUserById($_SESSION['user_data']['id']);
		 $this->data += $userValidate->getErrors();


		 AbsView::render('user/edit.php', $this->data);
	}
}