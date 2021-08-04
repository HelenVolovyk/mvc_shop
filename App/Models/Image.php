<?php
namespace App\Models;

use Framework\Core\AbsModel;

use PDO;

class Image extends AbsModel
{
	protected $tablename = 'images';

  public function __construct()
  {
	 $this->getDB();
  }
  
  public function store($img)
  {
	
	$sql = "INSERT INTO {$this->tableName} (img ) VALUES ('$img')";
	$sth = $this->db->prepare($sql);
	$sth->execute($img);
	
	//$sth->bindParam(':img', $img, PDO::PARAM_STR);

	return $this->db->lastInsertId();
  }

}