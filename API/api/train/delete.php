<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../../utils/FieldValidator.php';
require_once __DIR__ . '/../../services/TrainService.php';

$contents = file_get_contents('php://input');
$json = json_decode($contents, true);


if (isset($json["numero"]) && !empty($json["numero"])) {

  $new = TrainService::getInstance()->delete($json["numero"]);

  if ($new) {
    http_response_code(201);
    echo json_encode($new);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
  echo json_encode(false);
}



 ?>
