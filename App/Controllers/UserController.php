<?php
namespace App\Controllers;

use App\Models\User;
use App\Validator\User\UserCreateValidator;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Session\Session;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;


class UserController extends AbsController
{
<<<<<<< HEAD
	
=======
>>>>>>> feature/auth
	public function store (){
		
		$fields = filter_input_array(INPUT_POST, $_POST, 1);
		$userValidate = new UserCreateValidator();

		if ($userValidate->storeValidate($fields) && !$userValidate->checkEmailOnExist($fields['email'])){
			
			$user = new User();
			$newUser = $user->create($fields);
			
			  if($newUser){
			
				 $logger = new Logger('INFO LOGGER');
			    $logger->pushHandler(new  StreamHandler(INFOLOG_PATH , Logger::INFO));
				 $logger->info('new user registered', ['user' => $fields['name'], 'time' => date('H:i:s d.m.Y')]);
				 AbsView::site_redirect('/login');			
		
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
		 $this->data['data'] = $user->getUserById(Session::get('id'));
		 AbsView::render('user/edit.php', $this->data);
	}
<<<<<<< HEAD

=======
>>>>>>> feature/auth

	public function profile()
	{
		AbsView::render('user/profile.php');
	}
}