<?php
ini_set('display_errors',1);
 error_reporting(E_ALL);
require_once 'db/config.php';
require_once 'db/database.php';
  function check_login()
  {
    // Verifica se l'utente ha effettuato l'accesso
    if (isset($_SESSION['Username_utente']) && $_SESSION['Username_utente'] != "") {
        return TRUE;
    }
  }
  function check_availability($n)
  {
    $conn = openconnection();
    $sql = "SELECT Quantità FROM ProdottiInVendita p WHERE p.idProdotto=$n";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $quant=$row['Quantità'];
      if($quant>0 && $quant<4){
          echo'<p class="avaibility"><i class="fa fa-circle"></i> Affrettati, ne abbiamo solo:' . $quant .' </p>';
      }
      elseif ($quant==0) {
          echo '<p class="avaibility"><i class="fa fa-circle" style="color:red"></i>  Non disponibile </p>';
      }
      else {
        echo '<p class="avaibility"><i class="fa fa-circle"></i>  Ne rimangono: ' . $quant . '</p>';
      }
      return;
  }
  function ADD_TO_CART($n)
  {
    if (check_login() == TRUE) {
        echo '
        <form class="cart clearfix" method="POST" action="indexpaginaprotetta.php">
            <button type="submit" id="button_add_to_cart" value="5" class="btn amado-btn" name="set_provenience">Aggiungi al carrello</button>
        </form>';
        return $n;
    }
    else{
      echo '<form class="cart clearfix" method="post" action=login_section/login.php>
          <div class="cart-btn d-flex mb-50">

          </div>
          <button type="submit" name="addtocart" value="5" class="btn amado-btn">Login per aggiungere al carrello</button>
      </form>';
    }
  }
 ?>
