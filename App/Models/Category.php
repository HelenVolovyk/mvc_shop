<?php
namespace App\Models;

use Framework\Core\AbsModel;
use PDO;

class Category extends AbsModel
{

   protected $tablename = 'categories';


	public function __construct()
	{
	  $this->getDB();
	}
	
    public function getCategoriesList($page=1)
    {
      $sql = ("SELECT * FROM {$this->tablename} WHERE status = '1' ORDER BY id");
		$sth = $this->db->prepare($sql);
		$sth->execute();
		$category = $sth->fetchAll(PDO::FETCH_ASSOC);
		return !empty( $category) ?  $category : false;
	 }
	 

	 public function getCategoryById($id)
    {
		$sql = "SELECT * FROM {$this->tablename} WHERE id = :id";
		$sth = $this->db->prepare($sql);
		$sth->execute([':id' => $id]);
		$category = $sth->fetch(PDO::FETCH_ASSOC);
		return !empty( $category) ?  $category : false;
    }
	
 }