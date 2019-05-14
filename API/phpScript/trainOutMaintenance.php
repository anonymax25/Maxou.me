<?php
require_once __DIR__ . '/../models/Train.php';

$res = Train::removeFromCentre($_POST);

header("location: ../manage.php");
?>
