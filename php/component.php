<?php

function component($productname, $productprice, $productimg, $productid, $productcategory){
    $element = "

    <div class=\"item-box\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Zdjęcie\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>

                            <br>
                            <h5>
                                <span class=\"price\">$productprice USD</span>
                            </h5>
                            <br>
                            <button type=\"submit\" class=\"button\" name=\"add\">DODAJ <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productname, $productprice, $productimg, $productid, $productcategory){
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">

      <div class=\"row\">

          <div class=\"divimg-productb\">
              <img src=$productimg alt=\"Zdjęcie\" class=\"pimg\">
          </div>

          <div class=\"text-productb\">

              <small class=\"text-secondary\">$productcategory</small>

              <div class=\"amount\">
                <input type=\"text\" value=\"1\" class=\"amountform\">
              </div>

              <h5 class=\"pt-2\">$productprice PLN</h5>
              <button type=\"submit\" class=\"Removebt\" name=\"remove\">Remove</button>
          </div>

      </div>
      <hr class=\"mid-item\">
    </form>

    ";
    echo $element;
}
