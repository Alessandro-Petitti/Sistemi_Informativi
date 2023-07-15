<?php

require_once "Function_utility.php";

/*if(check_login() == TRUE){



  echo '<form class="cart clearfix" method="POST" action=indexpaginaprotetta.php>
      <div class="cart-btn d-flex mb-50">
          <p>Qty</p>
          <div class="quantity">
              <span class="qty-minus" onclick="var effect = document.getElementById("qty"); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
              <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
              <span class="qty-plus" onclick="var effect = document.getElementById("qty"); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
          </div>
      </div>
      <script>
      alert("Hello! I am an alert box!!");
        function set_provenience() {
          document.querySelector(".button_add_to_cart").onclick = function() {

            htmlspecialchars("<?php $_SESSION["Provenience"] = "cart"; ?>");
          }
          alert("Hello! I am an alert box!!");
        }

      </script>
      <button type="submit" id="button_add_to_cart" name="addtocart" value="5" class="btn amado-btn">Aggiungi al carrello</button>
  </form>';

}*/
if (check_login() == TRUE) {
    echo '
    <form class="cart clearfix" method="POST" action="indexpaginaprotetta.php">
        <div class="cart-btn d-flex mb-50">
            <p>Qty</p>
            <div class="quantity">
                <span class="qty-minus" onclick="var effect = document.getElementById(\'qty\'); var qty = effect.value; if( !isNaN( qty ) && qty > 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                <span class="qty-plus" onclick="var effect = document.getElementById(\'qty\'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
            </div>
        </div>
        <button type="submit" id="button_add_to_cart" value="5" class="btn amado-btn" name="set_provenience">Aggiungi al carrello</button>
    </form>';




}

else{
  echo '<form class="cart clearfix" method="post" action=login_section/login.php>
      <div class="cart-btn d-flex mb-50">

      </div>
      <button type="submit" name="addtocart" value="5" class="btn amado-btn">Login per aggiungere al carrello</button>
  </form>';

}

 ?>
