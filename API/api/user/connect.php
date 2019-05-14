<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../../utils/FieldValidator.php';
require_once __DIR__ . '/../../services/UserService.php';

$contents = file_get_contents('php://input');
$json = json_decode($contents, true);

if (FieldValidator::validate($json , ['email', 'password', 'token']) && $json['token'] == "supertokensananes") {

  $user = new User(NULL,$json['email'],UserService::hashPassword($json['password']),NULL);

  $new = UserService::getInstance()->connect($user);

  if ($new) {
    http_response_code(201);
    echo json_encode($new);
  } else {
    http_response_code(500);
  }

} else {
  $response = array("status_code" => 2,'message' => "user");
  echo json_encode($response);
  http_response_code(400);
}



 ?>
