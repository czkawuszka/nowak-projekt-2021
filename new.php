<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


$database = new CreateDb("sklep_items", "items"); //zrobse

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id");

        if(in_array($_POST['id'], $item_array_id)){
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Masz gosciu juz linka w css to po co tu drugi robisz-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="icon" href="icon.jpg">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php require_once ("php/header.php"); ?>
  <div class="main-txt">
  	<h1><center>Nowości</center></h1>
  	<h6><center>Nowe produkty będą dodawane tutaj :)</center></h6>
    <hr class="divider">
  </div>
  <div class="container">
      <?php
          $counter=0;
          $counter2=0;
          $result = $database->getNewData();
          while ($row = mysqli_fetch_assoc($result)){
            if($row['id_categories'] == 1 and $counter2<8)
            {
              if ($counter==4) {
                echo ("<br>");
                $counter=1;
              }
              else {
                $counter=$counter+1;
              }
              component("new.php",$row['name'], $row['price'], $row['image_path'], $row['id']);
              $counter2=$counter2+1;
            }
          }
      ?>
  </div>
  <footer>
    <p>&copy; 2021 Maciej Lebkowski, Jakub Wolny, Dawid Prusiecki 3ipG</p>
  </footer>
</body>
</html>
