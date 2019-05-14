<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../../utils/FieldValidator.php';
require_once __DIR__ . '/../../services/TrainService.php';

$contents = file_get_contents('php://input');
$json = json_decode($contents, true);

if (FieldValidator::validate($json , ['marque', 'modele', 'description', 'anneeConstruction'])) {

  //print_r($json);

  $train = new Train(NULL,$json['marque'],$json['modele'],$json['description'],$json['anneeConstruction']);

  $new = TrainService::getInstance()->insert($train);

  if ($new) {
    http_response_code(201);
    echo json_encode($new);
  } else {
    http_response_code(500);
  }

} else {
  http_response_code(400);
}



 ?>
