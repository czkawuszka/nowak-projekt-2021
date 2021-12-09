<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="icon" href="icon.jpg">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php require_once ("php/header.php"); ?>
  <div class="main-txt">
  	<h1><center>Epic Switch Shop</center></h1>
  	<h6><center>Wybierz coś dla siebie</center></h6>
    <hr class="divider">
  </div>
  <div class="main_wrapper">
    <!-- NEWLY ADDED -->
    <?php
      $database = new CreateDb("sklep_items", "items"); //wez najnowszy przedmiot i pobierz jego zdjecie
      $result = $database->getNewData();

      while ($row = mysqli_fetch_assoc($result)){
        $added_img = $row['image_path'];
        echo ("
        <div id=\"category\">
          <a href=\"new.php\"><img class=\"cat_img\" id=\"right_cat\" src=\"$added_img\"></a>
          <div class=\"cat_txt\">
            <h6 class=\"cat_txt\">Nowości</h6>
          </div>
        </div>");
        break;
      }
    ?>
    <!-- SWITCHES -->
    <div id="category">
      <a href="switch.php"><img class="cat_img" id="left_cat" src="./upload/switch/c3_tang.png"></a>
      <div class="cat_txt">
        <h6 class="cat_txt">Switche</h6>
      </div>
    </div>

  </div>
  <footer>
    <p>&copy; 2021 Maciej Lebkowski, Jakub Wolny, Dawid Prusiecki 3ipG</p>
  </footer>
</body>
</html>
