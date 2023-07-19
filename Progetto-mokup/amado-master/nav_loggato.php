<div>
    <a href="indexpaginaprotetta.php"><img src="img/core-img/logopic.png" alt="" width = "300" height = "183"></a><br> <br><br>
</div>

<nav class="amado-nav">
   <a href="Pagina-pulsanti.php" class="btn amado-btn mb-15">Bentornato <?php echo $_SESSION['Username_utente'] ?></a>
    <ul>
        <li><a href="indexpaginaprotetta.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
    </ul>

</nav>
<div class="cart-fav-search mb-100">
  <?php if(isset($_SESSION['cart_count']))
  {
    echo '<a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Carrello<span>('.$_SESSION['cart_count'].')</span></a>';
  }
  else {
      echo '<a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Carrello(0)</a>';
  }
  ?>


    <script>
      function verify_logout() {
        document.querySelector(".button_logout").onclick = function() {
          <?php
          $_SESSION['LOGOUT'] = 'true';
           ?>
        }
      }
    </script>
    <a href="index.php"  class="fav-nav"  ><img src="img/core-img/logout.png" alt=""> Logout</a>

</div>
