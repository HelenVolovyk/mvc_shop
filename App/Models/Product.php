<?php
namespace App\Models;

use Framework\Core\AbsModel;
use PDO;

class Product extends AbsModel
{
	
	/**
   * @var string
   */
  protected $tablename = 'products';

  public function __construct()
  {
	 $this->getDB();
  }

 
    public function getProductsList($limit, $offset, $sort='id', $direction='ASC', $search="")
    {
		$sqlSearch = "";
		if($search !== ""){
			$sqlSearch = "AND name LIKE '%$search%'";
		}
		 $sql = "SELECT * FROM {$this->tablename} WHERE quantity > '0' $sqlSearch ORDER BY $sort $direction LIMIT $limit OFFSET $offset";
		
		 $sth = $this->db->prepare($sql);
		 $sth->execute();
		 $product = $sth->fetchAll(PDO::FETCH_ASSOC);
		 return !empty( $product) ?  $product : false;
	 }
 
 
    public function getProductsListAjax($id = false)
    {
		 $sql = "SELECT * FROM {$this->tablename} WHERE quantity > '0' ";
		 
		 if($id){
			 if($id == 'up'){
				 $sql .= ' ORDER BY price';
			 } else if($id == 'down'){
				$sql .= ' ORDER BY price DESC';
				 
			 }
		 }
		 $sth = $this->db->prepare($sql);
		 $sth->execute();
		 $product = $sth->fetchAll(PDO::FETCH_ASSOC);
		 return !empty( $product) ?  $product : false;
	 }
 
    public function getProductsListByPriceUp($page, $limit, $offset)
    {
       $sql = "SELECT * FROM {$this->tablename} WHERE quantity > '0' ORDER BY price LIMIT $limit OFFSET $offset";
		 $sth = $this->db->prepare($sql);
		 $sth->execute();
		 $product = $sth->fetchAll(PDO::FETCH_ASSOC);
		 return !empty( $product) ?  $product : false;
	 }
 
    public function getProductsListByPriceDown($page, $limit, $offset)
    {
		 $sql = "SELECT * FROM {$this->tablename} WHERE quantity > '0' ORDER BY price DESC LIMIT $limit OFFSET $offset";
		 $sth = $this->db->prepare($sql);
		 $sth->execute();
		 $product = $sth->fetchAll(PDO::FETCH_ASSOC);
		 return !empty( $product) ?  $product : false;
	 }
	 
	 public function getProductById(int $id)
    {
		$sql = "SELECT * FROM {$this->tablename} WHERE id=:id";
		$sth = $this->db->prepare($sql);
		$sth->execute([':id' => $id]);
		$product = $sth->fetch(PDO::FETCH_ASSOC);
		return !empty( $product) ?  $product : false;
    }
  
	
    public  function getProductsListByCategory($category_id)
    {
        $sql = "SELECT * FROM {$this->tablename} 
        WHERE quantity > '0' AND category_id = :category_id";
		  $sth = $this->db->prepare($sql);
		  $sth->execute([':category_id' => $category_id]);
		  $product = $sth->fetchAll(PDO::FETCH_ASSOC);
		  return !empty( $product) ?  $product : false;
	
	}

	public  function getTotalProductsInCategory($categoryId)
	{
		$sql = "SELECT count(id) AS count FROM  {$this->tablename} 
		WHERE quantity > '0' AND category_id = :category_id";
	  	$sth = $this->db->prepare($sql);
	  	$sth->execute([':category_id' => $category_id, PDO::PARAM_INT]);
 	   $row = $sth->fetch();
		return $row['count'];
	}

	public  function getTotalProducts()
	{
		$sql = "SELECT count(id) AS count FROM  {$this->tablename} 
		WHERE quantity > '0'";
	   $sth = $this->db->prepare($sql);
		$sth->execute();
		$result = $sth->fetch(PDO::PARAM_INT);
		return $result['count'];
	}

	public  function searchProductsName($search, $page, $limit, $offset)
	{
		$page=1;
		$sql = "SELECT * FROM {$this->tablename} WHERE name LIKE '%$search%' LIMIT $limit OFFSET $offset";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		$products = $sth->fetchAll(PDO::FETCH_ASSOC);
		return !empty( $products) ?  $products : false;
	}

	public  function getProdustsByIds($idsString)
	{
		 $sql = "SELECT id, name, price FROM products WHERE quantity > '0' AND id IN ($idsString)";
		 $sth = $this->db->prepare($sql);
		 $sth->execute();
		 $products = $sth->fetchAll(PDO::FETCH_ASSOC);
		 return !empty( $products) ?  $products : false;
	}
}