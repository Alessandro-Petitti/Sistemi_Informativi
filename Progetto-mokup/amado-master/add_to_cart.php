<?php

require_once "Function_utility.php";


if (check_login() == TRUE) {
    echo '
    <form class="cart clearfix" method="POST" action="indexpaginaprotetta.php">

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
