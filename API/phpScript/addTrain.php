<?php
require_once __DIR__ . '/../models/Train.php';

$res = Train::addTrain($_POST);

header("location: ../manage.php");
?>
