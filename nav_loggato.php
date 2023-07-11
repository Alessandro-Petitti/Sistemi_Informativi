<div>
    <a href="indexpaginaprotetta.php"><img src="img/core-img/logopic.png" alt="" width = "300" height = "183"></a><br> <br><br>
</div>

<nav class="amado-nav">
   <a href="" class="btn amado-btn mb-15">Bentornato <?php echo $_SESSION['Username_utente'] ?></a>
    <ul>
        <li><a href="indexpaginaprotetta.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li class="active"><a href="product-details.html">Prodotti</a></li>
        <li><a href="cart.html">Carrello</a></li>
        <li><a href="checkout.html">Checkout</a></li>

    </ul>

</nav>
<div class="cart-fav-search mb-100">
    <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Carrello <span>(0)</span></a>
    <script>
      function verify_logout() {
        document.querySelector(".button_logout").onclick = function() {
          <?php
          $_SESSION['LOGOUT'] = 'true';
           ?>
        }
      }
    </script>
    <a href="index.php"  class="fav-nav"  ><img src="img/core-img/favorites.png" alt=""> Logout</a>

</div>
