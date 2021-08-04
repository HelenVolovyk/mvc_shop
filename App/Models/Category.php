<?php
namespace App\Models;

use Framework\Core\AbsModel;
use PDO;

class Category extends AbsModel
{

	/**
   * @var string
   */
   protected $tablename = 'categories';

	//  public function getContent()
	//  {
	// 	$categories = [
	// 		['name' => "product1", 'quantity' => 10],
	// 		['name' => "product2", 'quantity' => 8],
	// 		['name' => "product3", 'quantity' => 6]
	// 	 ];
		 
	// 	 return $categories;
	//  }


	public function __construct()
	{
	  $this->getDB();
	}
	
   /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public function getCategoriesList()
    {
            
       $sql = ("SELECT * FROM {$this->tablename} WHERE status = '1' ORDER BY id");
		 $sth = $this->db->prepare($sql);
		 $sth->execute();
		 $category = $sth->fetchAll(PDO::FETCH_ASSOC);
		 return !empty( $category) ?  $category : false;
		  
	 }
	 

	 public function getCategoryById($id)
    {
		$sql = "SELECT * FROM {$this->tablename} WHERE id=:id";
		$sth = $this->db->prepare($sql);
		$sth->execute([':id' => $id]);
		$category = $sth->fetch(PDO::FETCH_ASSOC);
		return !empty( $category) ?  $category : false;
    }
	
	
 }