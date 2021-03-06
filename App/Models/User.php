<?php
namespace App\Models;

use Framework\Core\AbsModel;
use PDO;


class User extends AbsModel
{
  
  protected $tablename = 'users';

  public function __construct()
  {
    $this->getDB();
  }

  /**
   * @param array $fields
   * @return mixed
   */
  public function create(array $fields)
  {
    $sql = "INSERT INTO {$this->tablename}(`name`, `email`, `pass`) VALUES (:name, :email, :pass)";
    $fields['pass'] = password_hash($fields['pass'], PASSWORD_DEFAULT);
    $sth = $this->db->prepare($sql);
    $sth->execute($fields);
    return $this->db->lastInsertId(); 
  }

  public function getUserByEmail(string $email)
  {
    $sql = "SELECT * FROM {$this->tablename} WHERE email=:email";
    $sth = $this->db->prepare($sql);
    $sth->execute([':email' => $email]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return !empty($user) ? $user : false;
  }

  public function checkUserData(string $email, string $pass)
  {
    $sql = "SELECT * FROM {$this->tablename} WHERE email=:email AND pass = :pass";
    $sth = $this->db->prepare($sql);
    $sth->execute([':email' => $email, ':pass' => $pass]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return !empty($user) ? $user : false;
  }

  public function getUserById(int $id)
  {
    $sql = "SELECT * FROM {$this->tablename} WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->execute([':id' => $id]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return !empty($user) ? $user : false;
  }

  public function getUserEmailExeptThisUser(string $email, int $id)
  {
    $sql = "SELECT COUNT(*) AS emails FROM {$this->tablename} WHERE id != :id AND email=:email";
    $sth = $this->db->prepare($sql);
    $sth->execute([':id' => $id, ':email' => $email]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return ($user['emails'] > 0) ? false : true;
  }


}