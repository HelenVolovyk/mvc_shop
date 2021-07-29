<?php
namespace Router;


return array(
   
    
	'home' 		 	=> 'home/index', 	
	'products'  	=> 'product/list',
	'categories'   => 'category/index',
	'news'      	=> "news/list",
	 
	 //auth
	'login' 			=> 'auth/login',
	'registration' => 'auth/registration',
	'auth' 			=> 'auth/auth',
	'logout' 		=> 'auth/logout',
	
	//user
	'user/store'	=> 'user/store',
	'user/index'	=> 'user/index',
	'user/edit'		=> 'user/edit'
);