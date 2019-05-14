<?php
require_once __DIR__ . '/../models/Train.php';

$res = Train::modifyTrain($_POST);

header("location: ../manage.php");
?>
