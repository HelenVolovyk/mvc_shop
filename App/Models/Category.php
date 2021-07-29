<?php
namespace App\Models;

use Framework\Core\AbsModel;

class Category extends AbsModel
{
	protected $fillable = [
		'name',
		'quantity'
	 ];

	 public function getContent()
	 {
		$categories = [
			['name' => "product1", 'quantity' => 10],
			['name' => "product2", 'quantity' => 8],
			['name' => "product3", 'quantity' => 6]
		 ];
		 
		 return $categories;
	 }

	
 }