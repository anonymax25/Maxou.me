<?php
require_once __DIR__ .'/../../require_class.php';

session_start();
session_unset();
session_destroy();

header('location: ../../index.php');
?>
