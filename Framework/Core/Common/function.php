<?php


function site_redirect($path = '')
{
	header ("Location" . SITE_URL . "/" . $path);
	exit;
}


	
function redirect_back()
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}