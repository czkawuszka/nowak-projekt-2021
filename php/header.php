
<header>
    <nav class="navbar">
        <a href="index.php" class="navbar-brand">
            <h3 class="navbar-text">Epic Switch Shop</h3>
        </a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav"> <!-- Cart -->
                <a href="cart.php" class="nav-item nav-link active">
                    <h3 class="navbar-text">Cart
                      <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h3>
                </a>
            </div>
        </div>

    </nav>
</header>
