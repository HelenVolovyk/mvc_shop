<?php
namespace App\Models;

use Framework\Core\AbsModel;
use PDO;

class Order extends AbsModel
{

	/**
   * @var string
   */
  protected $tablename = 'orders';

  public function __construct()
  {
	 $this->getDB();
  }
	
	public function save($fields)
	{
	
		$sql = 'INSERT INTO orders (name, email, phone, address, total, created_at) '
					. 'VALUES (:name, :email,  :phone, :address,  :total, :timestamp)';
		$fields['timestamp'] = date('Y-m-d H:i:s');
		$sth = $this->db->prepare($sql);
		$sth->execute($fields);
		$order = $sth->fetch(PDO::FETCH_ASSOC);
		return $this->db->lastInsertId(); 
		 
	}

	public function getOrderById(int $id)
	{
	  $sql = "SELECT * FROM {$this->tablename} WHERE id=:id";
	  $sth = $this->db->prepare($sql);
	  $sth->execute([':id' => $id]);
	  $order = $sth->fetch(PDO::FETCH_ASSOC);
	  return !empty( $order) ?  $order : false;
	}
 
}