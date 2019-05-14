<?php
require_once __DIR__ . '/../models/Train.php';

$res = Train::deleteTrain($_GET['numero']);

header("location: ../manage.php");
?>
