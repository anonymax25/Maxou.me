<?php
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!--
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  -->


  <style rel="stylesheet" src="css/navbar.css"></style>
  <style rel="stylesheet" src="css/main.css"></style>

</head>
<body style="background-color: #DDDDDD">
  <?php
  //navbar


  require_once "require_class.php";

  include 'navbar.php';

  //include page
  if(isset($_GET["page"])){
    include "pages/".$_GET["page"];
    if(strpos($_GET["page"], 'coding') === false){
      include 'footer.php';
    }

  }else{
    include 'pages/home/home.php';
    include 'footer.php';
  }




  ?>
</body>
</html>
