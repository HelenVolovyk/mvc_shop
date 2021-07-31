<?php
namespace Router;


return array(
   
    
	'' 		 		=> 'home/index', 	
	'products'  	=> 'product/list',
	'product/show' => 'product/show',
	'categories'   => 'category/index',
	'cart'      	=> "cart/index",
	 
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