<?php

//index
$router->addRoute('', 'HomeController@index');
$router->addRoute('home', 'HomeController@index');

//auth
$router->addRoute('login', 'AuthController@login');
$router->addRoute('registration', 'AuthController@registration');
$router->addRoute('auth', 'AuthController@auth');
$router->addRoute('logout', 'AuthController@logout');
$router->addRoute('verify', 'AuthController@verifiAuth');


//user
$router->addRoute('user/store', 'UserController@store');
$router->addRoute('user/index', 'UserController@index');
$router->addRoute('user/edit', 'UserController@edit');

//shop
$router->addRoute('shop', 'ProductController@index');
$router->addRoute('product/show', 'ProductController@show');

//card
$router->addRoute('card', 'CardController@index');


//migrate
$router->addRoute('migrate', 'MigrateController@migrate');