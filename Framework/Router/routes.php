<?php
namespace Router;


return array(
   
   //page
	'' 		 							=> 'page/home', 
	'about'   							=> 'page/about',
	'news'   							=> 'page/news',
	'contact'   						=> 'page/contact',
	'payment'   						=> 'page/payment',	
	
	//product
	'products'  								 => 'product/list',
	'products/page-([0-9]+)'  	 			 => 'product/list/$1',
	'products/ajax'  	 			 			 => 'product/ajax',
	'products/priceUp/page-([0-9]+)'  	 => 'product/priceUp/$1',
	'products/priceDown/page-([0-9]+)'   => 'product/priceDown/$1',
	'products/search/page-([0-9]+)'   	 => 'product/search/$1',
	'product/show/([0-9]+)'					 => 'product/show/$1',

	//category
	'category/show/([0-9]+)' 		=> 'category/show/$1', 
	'categories'   					=> 'category/index',

	//cart
	'cart'      						=> 'cart/index',
	'cart/add/([0-9]+)'      		=> 'cart/add/$1',
	'cart/delete/([0-9]+)'      	=> 'cart/delete/$1',
	'cart/checkout'					=> 'cart/checkout',
	
	//order
	'order/create'						=> 'order/create',

	 //auth
	'login' 								=> 'auth/login',
	'registration' 					=> 'auth/registration',
	'auth' 								=> 'auth/auth',
	'logout' 							=> 'auth/logout',
	
	//user
	'user/store'						=> 'user/store',
	'user/index'						=> 'user/index',
	'user/edit'							=> 'user/edit',
	'user/profile'						=> 'user/profile',

	//image
	'image' 								=> "image/upload",
	'image/store'						=> "image/store"
	
);