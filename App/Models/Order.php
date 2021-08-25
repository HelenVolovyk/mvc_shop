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
		 $sql = 'INSERT INTO orders (name, email, phone, address, total) '
					. 'VALUES (:name, :email,  :phone, :address,  :total)';
		 $sth = $this->db->prepare($sql);
		 $sth->execute($fields);
		 $order = $sth->fetch(PDO::FETCH_ASSOC);
		 return !empty( $order) ?  $oreder : false;
		 
	}
}