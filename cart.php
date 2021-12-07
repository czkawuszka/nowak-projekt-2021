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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Epic Switch Shop - Cart</title>
    <link rel="icon" href="icon.jpg">
    <link rel="stylesheet" type="text/css" href="style-cart.css">
</head>
<body>
<?php
    require_once ('php/header.php');
?>
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
  <div class="balans">
    <h1>siema</h1>
  </div>
</div>
</body>
</html>
