<?php
session_start();
if(isset($_SESSION["carrello_totale"])){
   $total_price = 0;
   if (isset($_POST['action']) && $_POST['action']=="remove"){
      if(!empty($_SESSION["carrello_totale"])) {
        foreach($_SESSION["carrello_totale"] as $key => $value){
        if(intval($_POST["code"]) == $key){
        unset($_SESSION["carrello_totale"][$key]);
        $_SESSION['cart_count']  =$_SESSION['cart_count']-1;
        $status = "<div class='box' style='color:red;'>
        Prodotto rimosso dal carrello!</div>";
        }
        if(empty($_SESSION["carrello_totale"])){
        unset($_SESSION["carrello_totale"]);
        header("location: cart.php");}
        }
      }
    }
    if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["carrello_totale"] as &$value){
      if($value['codice'] === $_POST["code"]){
          $value['quanti'] = $_POST["quantity"];
          break; // Stop the loop after we've found the product
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <?php
        include 'header.php'; ?>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Carrello</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Prezzo</th>
                                        <th>Quantità</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  foreach ($_SESSION["carrello_totale"] as $product){
                                    ?>
                                    <tr>
                                        <td class="cart_product_img">
                                          <?php echo'<img src="img/product-img/'.$product["codice"].'.jpg" alt="Product">'; ?>
                                        </td>
                                        <td class="cart_product_desc">
                                          <?php echo'<h5>'. $product["nome"].' </h5>';  ?>
                                          <br>
                                          <form method='post' action='cart.php'>
                                          <input type='hidden' name='code' value="<?php echo $product["codice"];?>"/>
                                          <input type='hidden' name='action' value="remove"/>
                                          <button type='submit' class="btn amado-btn w-100">Rimuovi l'articolo</button>
                                          </form>
                                        </td>
                                        <td class="price">
                                          <?php echo'<span>'. $product["prezzo"].'€ </span>';?>
                                        </td>
                                        <td class="qty">
                                          <form method='post' action=''>
                                              <input type='hidden' name='code' value="<?php echo $product["codice"]; ?>" />
                                              <input type='hidden' name='action' value="change" />
                                              <select name='quantity' class='quantity custom-dropdown' onChange="this.form.submit()">
                                                  <option <?php if($product["quanti"]==1) echo "selected";?> value="1">1</option>
                                                  <option <?php if($product["quanti"]==2) echo "selected";?> value="2">2</option>
                                                  <option <?php if($product["quanti"]==3) echo "selected";?> value="3">3</option>
                                                  <option <?php if($product["quanti"]==4) echo "selected";?> value="4">4</option>
                                                  <option <?php if($product["quanti"]==5) echo "selected";?> value="5">5</option>
                                              </select>
                                          </form>
                                       </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                  <?php $total_price =  $total_price+ $product["prezzo"]*$product["quanti"];
                                   $_SESSION['quanti_carrello'][$product["codice"]] = $product["quanti"];};
                                  $_SESSION["prezzo_carrello"] = $total_price;
                                  //$quanti_carrello[$id_prodotto] = $quantita;

                                   ?>
                                  <tr>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Totale</h5>
                            <ul class="summary-table">
                                <li><span>Subtotale:</span>
                                  <?php echo "<span>".$total_price."€</span>"; ?></li>
                                <li><span>Spedizione:</span> <span>Gratuita</span></li>
                                <li><span>Totale:</span>
                                  <?php echo "<span>".$total_price."€</span>"; ?></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="checkout.php" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php include 'newsletter.php'; ?>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'footer.php'; ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <?php
      }
      else
      {
        echo" <style media='screen'>
                h1 {
                text-align: center;
                }
            </style>";
        echo "<h1>Il carrello è vuoto!</h1>";
    //pagina del carrello vuota:    ?>
<head>
      <!-- Title  -->
      <title>Amado - Furniture Ecommerce Template | Cart</title>

      <!-- Favicon  -->
      <link rel="icon" href="img/core-img/favicon.ico">

      <!-- Core Style CSS -->
      <link rel="stylesheet" href="css/core-style.css">
      <link rel="stylesheet" href="style.css">

</head>

<body>
      <!-- Search Wrapper Area Start -->
      <div class="search-wrapper section-padding-100">
          <div class="search-close">
              <i class="fa fa-close" aria-hidden="true"></i>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="search-content">
                          <form action="#" method="get">
                              <input type="search" name="search" id="search" placeholder="Type your keyword...">
                              <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Search Wrapper Area End -->

      <!-- ##### Main Content Wrapper Start ##### -->
      <div class="main-content-wrapper d-flex clearfix">

          <!-- Mobile Nav (max width 767px)-->
          <div class="mobile-nav">
              <!-- Navbar Brand -->
              <div class="amado-navbar-brand">
                  <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
              </div>
              <!-- Navbar Toggler -->
              <div class="amado-navbar-toggler">
                  <span></span><span></span><span></span>
              </div>
          </div>

          <!-- Header Area Start -->
          <?php
          include 'header.php'; ?>
          <!-- Header Area End -->

          <div class="cart-table-area section-padding-100">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12 col-lg-8">
                          <div class="cart-title mt-50">
                              <h2>Carrello</h2>
                          </div>

                          <div class="cart-table clearfix">
                              <table class="table table-responsive">
                                  <thead>
                                      <tr>
                                          <th></th>
                                          <th>Nome</th>
                                          <th>Prezzo</th>
                                          <th>Quantità</th>
                                      </tr>
                                  </thead>
                                  </table>
                                </div>
                              </div>
                          </div>
                          <div class="col-12 col-lg-4">
                              <div class="cart-summary">
                                  <h5>Totale</h5>
                                  <ul class="summary-table">
                                      <li><span>Subtotale:</span>
                                        </li>
                                      <li><span>Spedizione:</span> </li>
                                      <li><span>Totale:</span>
                                        </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- ##### Main Content Wrapper End ##### -->

                  <!-- ##### Newsletter Area Start ##### -->
                  <?php include 'newsletter.php'; ?>
                  <!-- ##### Newsletter Area End ##### -->

                  <!-- ##### Footer Area Start ##### -->
                  <?php include 'footer.php'; ?>
                  <!-- ##### Footer Area End ##### -->

                  <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
                  <script src="js/jquery/jquery-2.2.4.min.js"></script>
                  <!-- Popper js -->
                  <script src="js/popper.min.js"></script>
                  <!-- Bootstrap js -->
                  <script src="js/bootstrap.min.js"></script>
                  <!-- Plugins js -->
                  <script src="js/plugins.js"></script>
                  <!-- Active js -->
                  <script src="js/active.js"></script>
                <?php }; ?>
</body>
</html>
