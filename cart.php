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
    <link rel="stylesheet" type="text/css" href="style.css">
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
                      cartElement($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description'], $row['product_category'], $row['product_amount']);
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
