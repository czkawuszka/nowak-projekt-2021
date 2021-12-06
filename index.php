<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
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

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="icon" href="icon.jpg">

    <style>
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- CSS*/
    /*
    yellow: #ffff93
    yellow-dim: #eff0b6
    purple: #9393ff
    white: #fffff
    */
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300;800&display=swap');

    *{
      margin: 0;
      font-family: 'Raleway', sans-serif;
    }
    a{
      color: inherit;
      text-decoration: inherit;
    }

    .button {
      background-color: #9393ff; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 8px;
    }

    .card-title{
      font-size:24px;
    }
    .price{
      font-size:24px;
    }
    .item-box{
      display: inline-block;
    }
    .navbar{
      position:relative;
      display:-ms-flexbox;
      display:flex;
      -ms-flex-wrap:wrap;
      flex-wrap:wrap;
      -ms-flex-align:center;
      align-items:center;
      -ms-flex-pack:justify;
      justify-content:space-between;
      padding:.5rem 1rem
    }

    .container{
      width:100%;
      text-align: center;
      padding-top:15px;
      padding-bottom: 15px;
    }

    .item-box{
      margin-left: 5px;
      margin-right: 5px;
      border-style: solid;
      border-width: 2px;
      padding: 3px;
      border-radius: 8px;
      padding: 5px;
      margin-bottom: 5px;
      margin-top: 5px;
    }

    .navbar-text{
      font-size: 29px;
    }
    img{
      width: 230px;
      padding-bottom: 15px;
      border-radius:8px;
    }
    body {
        background-color: #ffffff;
        color: #b16088;
    }

    .witampananowaka{
      width: 100%;
      margin-top: 25px;
      text-align: center;
      font-size: 28px;
    }

    hr{
      width: 10%;
      border: 1px solid;
      display: inline-block;
    }

    @keyframes background_colour {
        0% {
            background-color: #eff0b6;
            color: #763857;
        }
        50% {
            background-color: #ffff93;
            color: #b16088;
        }
        100% {
            background-color: #eff0b6;
            color: #763857;
        }
    }
    #filler{
      margin-bottom: 250px;
      height: 1px;
    }
    header{
      animation: background_colour 15s infinite ease-in-out;
    }

    footer{
      font-size: 10 px;
    }


    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- CSS*/
    </style>
</head>
<body>


  <?php require_once ("php/header.php"); ?>
  <div class="witampananowaka">
    <h2>New Arrivals</h2>
    <hr>
  </div>
  <div class="container">
            <?php
                $counter=0;
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){

                    if ($counter==3) { //change this to change the number of items in a row
                      echo ("<br>");
                      $counter=0;
                    }
                    else {
                      $counter=$counter+1;
                    }
                    //$counter=$counter+1;
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description'], $row['product_category'], $row['product_amount']);
                }
            ?>
  </div>
  <div id="filler"></div>
  <footer>
    <p>Creators: Maciej Lebkowski, Jakub Wolny, Dawid Prusiecki 3ipG</p>
  </footer>
</body>
</html>
