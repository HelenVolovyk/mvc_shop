<?php
namespace App\Controllers;


use App\Models\User;
use App\Validator\User\UserCreateValidator;
use App\Validator\User\UserUpdateValidator;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use Framework\Logger\LogStreamer;
use Framework\Session\Session;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use SessionHandler;

class UserController extends AbsController
{
	
	public function store (){
		
		$fields = filter_input_array(INPUT_POST, $_POST, 1);
		$userValidate = new UserCreateValidator();

		if ($userValidate->storeValidate($fields) && !$userValidate->checkEmailOnExist($fields['email'])){
			
			$user = new User();
			$newUser = $user->create($fields);
			
			  if($newUser){
				 // LogStreamer::info('new user registered', ['user' => $fields['name']]);

				//  $logger = new Logger('info');
				//  $logger->pushHandler(new  StreamHandler(ROOT_PATH . '/Framework/Logger/info_log'));
				//  $logger->info('My logger is now ready');
				//  AbsView::site_redirect('/login');
			
				  
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


	public function profile()
	{
		AbsView::render('user/profile.php');
	}
}