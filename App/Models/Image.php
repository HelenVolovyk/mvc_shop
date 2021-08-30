<?php
namespace App\Models;

use Framework\Core\AbsModel;

use PDO;

class Image extends AbsModel
{
	public function __construct()
  	{
	 $this->getDB();
   }
  
  public function store($img)
  {
	$sql = "INSERT INTO images (img) VALUES ('$img')";
	$sth = $this->db->prepare($sql);
	$sth->execute();
	$img = $sth->fetch(PDO::FETCH_ASSOC);
	return !empty( $img) ?  $img : false;
	}

}