<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);

          }
      }
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
    <title>Epic Switch Shop - Cart</title>
    <link rel="icon" href="icon.jpg">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300;800&display=swap');

      /*
      yellow: #ffff93
      yellow-dim: #eff0b6
      purple: #9393ff
      white: #fffff
      */


      *{
        margin: 0;
        font-family: 'Raleway', sans-serif;
      }
      a{
        color: inherit;
        text-decoration: inherit;
      }
      body {
          background-color: #ffffff;
          color: #b16088;
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

      header{
        animation: background_colour 15s infinite ease-in-out;
      }

      .navbar-text{
        font-size: 29px;
      }

      .container{
        padding-top:15px;
        padding-bottom: 15px;
        margin-top: 5px;
        margin-bottom: 5px;
        margin-left: 15px;
      }
      .shopping-cart{
        width: 55%;
        display:inline-block;
        text-align: left;
        float: left;
      }
      .calculations{
        width: 45%;
        display:inline-block;
        float: left;
      }

      .row{
        border-style: none;
        border-width: 2px;
        border-radius: 8px;
        margin-bottom: 5px;
        padding: 15px;
        margin-right: 40px;
        margin-left: 40px;
      }
      small{
        font-size: 14px;
      }

      .pt-2{
        font-size: 21px;
      }

      .Removebt {
        background-color: #f47174;
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 3px;
        height: 21px;
      }

      .witampananowaka{
        width: 100%;
        margin-top: 75px;
        text-align: center;
        font-size: 28px;
      }

      #top{
        width: 10%;
        border: 1px solid;
        display: inline-block;
      }

      .pimg
      {
        width: 175px;
        border-radius: 8px;
        margin-bottom: 10px;
      }
    </style>
</head>
<body>

<?php
    require_once ('php/header.php');
?>
<div class="witampananowaka">
  <h2>Basket</h2>
  <hr id="top">
</div>
<div class="wrapper">
  <div class="item_row">
    <?php
      $total = 0;
      if (isset($_SESSION['cart'])){
          $product_id = array_column($_SESSION['cart'], 'product_id');

          $result = $db->getData();
          while ($row = mysqli_fetch_assoc($result)){
              foreach ($product_id as $id){
                  if ($row['id'] == $id){
                      cartElement($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_category']);
                      $total = $total + (int)$row['product_price'];
                  }
              }
          }
      }

    ?>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
