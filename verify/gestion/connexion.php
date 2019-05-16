<?php
ini_set('display_errors', 1);
session_start();

require_once __DIR__ .'/../../API/models/User.php';

$response = User::connect($_POST);

if ($response['status_code'] == 1) {
  unset($_SESSION["error"]);
  $userData = $response['data'];
  $user = new User($userData['id'],$userData['email'],$userData['password'],$userData['username']);
  $_SESSION['user'] = serialize($user);
  header("location: ../../index.php");
} else {
  $_SESSION["error"] = "connexion";
  header("location: ../../index.php?page=gestion/connexion.php");
}




?>
