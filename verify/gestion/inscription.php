<?php
require_once __DIR__ .'/../../require_class.php';

$bdd = new Maxou\Database('maxou','root','','localhost');
$user = new Maxou\User(-1,$_POST["email"], $_POST["username"], $_POST["password"], $_POST["verifyPassword"]);

$user->__toString();

if(!$user->checkUserExists($bdd)){
  $user->addUsertoDB($bdd);
  $user->AddToSession($bdd);
}else{
  header("location: ../../index.php?page=gestion/inscription.php");
}
header("location: ../../index.php?page=home/home.php")
 ?>
