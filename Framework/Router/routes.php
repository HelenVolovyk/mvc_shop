<?php
namespace Router;


return array(
   
    
	'' 		 		=> 'home/index', 	
	'products'  	=> 'product/list',
	'products/page-([0-9]+)'  	 => 'product/list/$1',
	'products/page-([0-9]+)'  	 => 'product/list/$1',
	'products/priceUp/page-([0-9]+)'  	 => 'product/listByPriceUp/$1',
	'products/priceDown/page-([0-9]+)'   => 'product/listByPriceDown/$1',
	'product/show/([0-9]+)'		 => 'product/show/$1',

	'categories'   => 'category/index',
	'cart'      	=> "cart/index",
	'cart/add/([0-9]+)'      		=> "cart/add/$1",
	'cart/addAjax/([0-9]+)'      	=> "cart/addAjax/$1",
	 
	'category/show/([0-9]+)' => 'category/show/$1', 

	 'about'   		=> 'page/about',
	 'news'   		=> 'page/news',
	 'contact'   	=> 'page/contact',
	 'payment'   	=> 'page/payment',
	
	 //auth
	'login' 			=> 'auth/login',
	'registration' => 'auth/registration',
	'auth' 			=> 'auth/auth',
	'logout' 		=> 'auth/logout',
	
	//user
	'user/store'	=> 'user/store',
	'user/index'	=> 'user/index',
	'user/edit'		=> 'user/edit',
	'user/profile'	=> 'user/profile',

	'image' 			=> "image/upload",
	'image/store'	=> "image/store"
	
);