<?php
namespace Maxou;
/**
 *
 */
class User{
  private $id;
  private $email;
  private $username;
  private $password;
  private $verifyPassword;

  public function __construct($id,$email, $username, $password, $verifyPassword){
    $this->id=$id;
    $this->email=$email;
    $this->username=$username;
    $this->password=$password;
    $this->verifyPassword=$verifyPassword;
  }

  public function __toString(){
    echo "<p>id: ".$this->getId()." | email: ".$this->getEmail()." | username: ".$this->getUsername()." | password: ".$this->getPassword()." | verify: ".$this->getVerifyPassword()."</p>";
  }

  //getters
  public function getId(){return $this->id;}
  public function getEmail(){return $this->email;}
	public function getUsername(){return $this->username;}
	public function getPassword(){return $this->password;}
  public function getVerifyPassword(){return $this->verifyPassword;}
  //setters
  public function setId($id){	$this->id = $id;}
  public function setUsername($username){	$this->username = $username;}
  public function setEmail($email){$this->email = $email;}
	public function setPassword($password){$this->password = $password;}
  public function setVerifyPassword($verifyPassword){$this->verifyPassword = $verifyPassword;}

  public function checkUserExists($bdd){
    $check = $bdd->getPDO()->prepare('SELECT * FROM users WHERE email=:email');
    $check->execute(array(
      'email' => $this->getEmail()
    ));
    return $check->rowCount();
  }

  public function hashPassword() {
    $salting='a34Rvepin1adokvTnwSeiMaxImWillETYOU';
    return hash('md5',$salting.$this->password);

  }

  public function addUsertoDB($bdd) {
    $req = $bdd->getPDO()->prepare('INSERT INTO users (email,username,password) VALUES (:email,:username,:password)');
    $req->bindValue(':email', $this->getEmail());
    $req->bindValue(':username', $this->getUsername());
    $req->bindValue(':password',$this->hashPassword($this->getPassword()));
    $req->execute();
    $req->closeCursor();
  }

  public function AddToSession($bdd) {
    session_start();

    $req = $bdd->getPDO()->prepare('SELECT * FROM users WHERE email=:email');
    $req->bindValue(':email', $this->getEmail());
    $req->execute();
    while	($donnees	=	$req->fetch())
    {
      $this->setId($donnees['id']);
    }

    $_SESSION["user"] = serialize($this);
  }
}

 ?>
