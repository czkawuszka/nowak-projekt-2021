<?php

function component($src, $productname, $productprice, $img, $productid){
    $element = "

    <div class=\"item-box\">
                <form action=\"$src\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$img\" alt=\"Zdjęcie\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>

                            <br>
                            <h5>
                                <span class=\"price\">$productprice USD</span>
                            </h5>
                            <br>
                            <button type=\"submit\" class=\"button\" name=\"add\">DODAJ<i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productname, $productprice, $productimg, $productid){
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-item\">

      <div class=\"row\">

          <div class=\"cproduct-img\">
              <img src=$productimg alt=\"Zdjęcie\" class=\"pimg\">
          </div>

          <div class=\"cproduct-txt\">

              <div class=\"cinfo\" id=\"cinfo\">
                <h5 class=\"pt-2\">$productname</h5>
                <small>$$productprice</small>
              </div>
              <div class=\"cinfo\" id=\"amount\">
                <input type=\"text\" value=\"1\" class=\"amountform\">
                <button type=\"submit\" class=\"Removebt\" name=\"remove\">Remove</button>
              </div>
          </div>

      </div>
    </form>

    ";
    echo $element;
}
