<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../../services/TrainService.php';

$contents = file_get_contents('php://input');
$json = json_decode($contents, true);


if (isset($json["idCentre"]) && !empty($json["idCentre"])) {

  $trains = TrainService::getInstance()->getTrainInCentre($json["idCentre"]);

  //var_dump($trains);

  if ($trains) {
    http_response_code(201);
    echo json_encode($trains);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}

 ?>
