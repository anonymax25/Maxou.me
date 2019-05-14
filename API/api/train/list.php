<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../../services/TrainService.php';

$trains = TrainService::getInstance()->allTrains();
echo json_encode($trains);

 ?>
