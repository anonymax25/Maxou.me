<?php
require_once __DIR__ . '/../models/Train.php';

$res = Train::addToCentre($_POST);

header("location: ../manage.php");
?>
