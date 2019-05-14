<?php
namespace Maxou;

use \PDO;

class Database{

  private $db_name;
  private $db_user;
  private $db_pass;
  private $db_host;
  private $pdo;

  public function __construct($db_name,$db_user = 'root', $db_pass = '', $db_host = 'localhost'){
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_host = $db_host;
    $this->newPDO();
  }

  public function getDb_name(){return $this->db_name;}
	public function getDb_user(){return $this->db_user;}
  public function getDb_pass(){return $this->db_pass;}
  public function getDb_host(){return $this->db_host;}
  public function getPdo(){return $this->pdo;}

  public function setDb_name($db_name){$this->db_name = $db_name;}
  public function setDb_user($db_user){$this->db_user = $db_user;}
  public function setDb_pass($db_pass){$this->db_pass = $db_pass;}
  public function setDb_host($db_host){$this->db_host = $db_host;}
  public function setPdo($pdo){$this->pdo = $pdo;}

  public function newPDO(){
      $pdo = new PDO('mysql:dbname='.$this->getDb_name().';host='.$this->getDb_host().';charset=UTF8', ''.$this->getDb_user().'', ''.$this->getDb_pass().'');

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->setPdo($pdo);
  }

  public function queryPrepareForWhile($statement){
    $chauffeurs = $this->getPdo()->prepare($statement);
    $chauffeurs->execute();
    return $chauffeurs;
  }

  public function query($statement){  //, $class_name
    $req = $this->getPdo()->query($statement);
    $datas = $req->fetchALL(); //PDO::FETCH_CLASS, $class_name
    return $datas;
  }

  public function queryOne($statement){  //, $class_name
    $req = $this->getPdo()->query($statement);
    $datas = $req->fetch(); //PDO::FETCH_CLASS, $class_name
    return $datas;
  }

  public function queryInsert($statement){  //, $class_name
    $req=$this->getPDO()->prepare($statement);
    $req->execute();
    $req->closeCursor();
  }
}
 ?>
