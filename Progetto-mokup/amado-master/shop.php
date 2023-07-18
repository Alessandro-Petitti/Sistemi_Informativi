<?php
require_once 'db/config.php';
require_once 'db/database.php';
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
    <title>Amado - Furniture Ecommerce Template | Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">



    <style>
    .mio-bottone {
        background-color: #f5f7fa;
        color: grey;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }

    .caption {
    font-family: Verdana, sans-serif;
    font-size: 10px;
    float: left;
    margin: 0;
    padding: 0;
    position: relative;
    overflow: hidden;
}

.caption img {
    float: left;
    margin: 0;
    padding: 0;
    background: #fff;
    border: none;
}

.caption span {
    float: left;
    margin: 0;
    padding: 10px;
    width: 100%;
    color: #dedede;

    background: #222; /* browser che non supportano rgba */
    background: rgba(0,0,0,0.7);
    position: absolute;
    left: 0;
    bottom: 0;
}

.caption span strong {
    font-weight: bold;
    font-size: 11px;
    text-transform: uppercase;
    display: block;
    padding-bottom: 5px;
}


.caption span { display: none; }
.caption:hover span { display: block; }

#stella {color: #fbb710;}


</style>

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
        session_start();
        include 'header.php'; ?>
        <!-- Header Area End -->

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Reparti</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                      <li><form class="cart clearfix" method="GET" action="shop.php">
                        <button type="submit" id="button_arredamento" value="5" class="mio-bottone" name="button_arredamento">Tutti i reparti</button>
                      </form></li>

                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_arredamento" value="4" class="mio-bottone" name="button_arredamento">Arredamento</button>
                        </form></li>

                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_arredamento" value="3" class="mio-bottone" name="button_arredamento">Soggiorno</button>
                        </form></li>
                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_arredamento" value="2" class="mio-bottone" name="button_arredamento">Illuminazione</button>
                        </form></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Casa produttrice</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                      <li><form class="cart clearfix" method="GET" action="shop.php">
                        <button type="submit" id="button_casa" value="1" class="mio-bottone" name="button_casa">Tutte le case produttrici</button>
                      </form></li>

                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_casa" value="2" class="mio-bottone" name="button_casa">Di nostra produzione</button>
                        </form></li>

                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_casa" value="3" class="mio-bottone" name="button_casa">Produzione esterna</button>
                        </form></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->


            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                <!-- Widget Title -->
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Reparti</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                      <li><form class="cart clearfix" method="GET" action="shop.php">
                        <button type="submit" id="button_prezzo" value="1" class="mio-bottone" name="button_prezzo">Fino a €20</button>
                      </form></li>
                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_prezzo" value="2" class="mio-bottone" name="button_prezzo">€20-€50</button>
                        </form></li>

                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_prezzo" value="3" class="mio-bottone" name="button_prezzo">€50-€100</button>
                        </form></li>
                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_prezzo" value="4" class="mio-bottone" name="button_prezzo">€100-€200</button>
                        </form></li>
                        <li><form class="cart clearfix" method="GET" action="shop.php">
                          <button type="submit" id="button_prezzo" value="5" class="mio-bottone" name="button_prezzo">Oltre €200</button>
                        </form></li>
                    </ul>
                </div>
            </div>
            
        </div>

        <div align="center" class="amado_product_area section-padding-100">





          <div class="container-fluid">


                      <div class="cart-title mt-50">
                          <h2>Prodotti</h2>
                      </div>

                      <?php
                      if(!isset($_GET["button_arredamento"])){
                        echo "<h3>Seleziona un filtro</h3>";

                      } ?>

                      <div class="row">

                          <!-- Single Product Area -->

                          <?php
                          if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["button_arredamento"])){
                                      $conn = openconnection();

                                      if($_GET["button_arredamento"]==5){
                                        $sql = "SELECT * FROM ProdottiInVendita";
                                      }
                                      else if($_GET["button_arredamento"]==4){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE Reparti_idReparto = 1";
                                      }else if($_GET["button_arredamento"]==3){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE Reparti_idReparto = 2";
                                      }else if($_GET["button_arredamento"]==2){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE Reparti_idReparto = 3";
                                      }
                                      $result = $conn->query($sql);

                                      $selezione = array(); // Inizializza l'array selezione
                                      $mioArray = array();

                                      while ($row = $result->fetch_assoc()) {
                                        $codice = $row['idProdotto'];
                                        $nome = $row['NomeProdotto'];
                                        $prezzo = $row['Prezzo'];
                                        $casa_prod = $row['CasaProduttrice'];

                                        // Aggiungi l'elemento corrente a $selezione
                                        $elemento = array(
                                          'nome' => $nome,
                                          'codice' => $codice,
                                          'prezzo' => $prezzo,
                                          'casa_prod' => $casa_prod,
                                          'quanti' => 1
                                        );

                                        // Aggiungi l'elemento corrente a $selezione
                                        $selezione[$codice] = $elemento;
                                      }

                                      closeconnection($conn);

                                      if(count(array_keys($selezione))==0){
                                        echo "Sembra che nessun prodotto soddisfi il filtro richiesto";
                                      }

                              foreach ($selezione as $codice=> $elemento){
                                ?>
                                <!--<div class="col-12 col-sm-6 col-md-12 col-xl-6">-->
                                <div class="single-products-catagory clearfix">
                                    <div class="single-product-wrapper">
                                      <a href="">
                                        <!-- Product Image -->






                                        <?php echo'<img src="img/product-img/'.$selezione[$codice]["codice"].'.jpg" alt="Product">'; ?>
                                        <!-- Product Description -->
                                        <!-- Product Meta Data -->
                                        <div class="product-description d-flex align-items-center justify-content-between">
                                            <div class="product-meta-data">
                                              <div class="ratings-review">
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="false"></i>
                                              </div>

                                                <div class="line"></div>

                                                    <div class="product-price"><?php echo "€".$selezione[$codice]["prezzo"] ?></div>
                                                <a href="product-details.html">
                                                       <h6><?php echo $selezione[$codice]["nome"]?></h6>
                                                </a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php  }}
                            $_GET["button_arredamento"]="";?>




                          <!--  ------------------------------------------------------------------------------------->





                          <?php
                          if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["button_prezzo"])){
                                      $conn = openconnection();

                                      if($_GET["button_prezzo"]==1){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE prezzo < 20";
                                      }
                                      else if($_GET["button_prezzo"]==2){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE 20<=prezzo && prezzo<50";
                                      }else if($_GET["button_prezzo"]==3){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE 50<prezzo && prezzo<100";
                                      }else if($_GET["button_prezzo"]==4){
                                        $sql = "SELECT * FROM ProdottiInVendita WHERE prezzo<200 && prezzo>=100";
                                      }else if($_GET["button_prezzo"]==5){
                                      $sql = "SELECT * FROM ProdottiInVendita WHERE prezzo>=200";
                                    }
                                      $result = $conn->query($sql);

                                      $selezione = array(); // Inizializza l'array selezione

                                      while ($row = $result->fetch_assoc()) {
                                        $codice = $row['idProdotto'];
                                        $nome = $row['NomeProdotto'];
                                        $prezzo = $row['Prezzo'];
                                        $casa_prod = $row['CasaProduttrice'];

                                        // Aggiungi l'elemento corrente a $selezione
                                        $elemento = array(
                                          'nome' => $nome,
                                          'codice' => $codice,
                                          'prezzo' => $prezzo,
                                          'casa_prod' => $casa_prod,
                                          'quanti' => 1
                                        );

                                        // Aggiungi l'elemento corrente a $selezione
                                        $selezione[$codice] = $elemento;
                                      }

                                      closeconnection($conn);

                                      if(count(array_keys($selezione))==0){
                                        echo "Sembra che nessun prodotto soddisfi il filtro richiesto";
                                      }

                              foreach ($selezione as $codice=> $elemento){
                                ?>
                                <!--<div class="col-12 col-sm-6 col-md-12 col-xl-6">-->
                                <div class="single-products-catagory clearfix">
                                    <div class="single-product-wrapper">
                                      <a href="">
                                        <!-- Product Image -->






                                        <?php echo'<img src="img/product-img/'.$selezione[$codice]["codice"].'.jpg" alt="Product">'; ?>
                                        <!-- Product Description -->
                                        <!-- Product Meta Data -->
                                        <div class="product-description d-flex align-items-center justify-content-between">
                                            <div class="product-meta-data">
                                              <div class="ratings-review">
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                  <i id="stella" class="fa fa-star" aria-hidden="false"></i>
                                              </div>

                                                <div class="line"></div>

                                                    <div class="product-price"><?php echo "€".$selezione[$codice]["prezzo"] ?></div>
                                                <a href="product-details.html">
                                                       <h6><?php echo $selezione[$codice]["nome"]?></h6>
                                                </a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php  }}
                            $_GET["button_prezzo"]="";?>



                        <!---------------------------------------------------------------------------------------------->



                            <?php
                            if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["button_casa"])){
                                        $conn = openconnection();

                                        if($_GET["button_casa"]==1){
                                          $sql = "SELECT * FROM ProdottiInVendita";
                                        }
                                        else if($_GET["button_casa"]==2){
                                          $sql = "SELECT * FROM ProdottiInVendita WHERE CasaProduttrice = 0";
                                        }else if($_GET["button_casa"]==3){
                                          $sql = "SELECT * FROM ProdottiInVendita WHERE CasaProduttrice != 0";
                                        }
                                        $result = $conn->query($sql);

                                        $selezione = array(); // Inizializza l'array selezione
                                        $mioArray = array();

                                        while ($row = $result->fetch_assoc()) {
                                          $codice = $row['idProdotto'];
                                          $nome = $row['NomeProdotto'];
                                          $prezzo = $row['Prezzo'];
                                          $casa_prod = $row['CasaProduttrice'];

                                          // Aggiungi l'elemento corrente a $selezione
                                          $elemento = array(
                                            'nome' => $nome,
                                            'codice' => $codice,
                                            'prezzo' => $prezzo,
                                            'casa_prod' => $casa_prod,
                                            'quanti' => 1
                                          );

                                          // Aggiungi l'elemento corrente a $selezione
                                          $selezione[$codice] = $elemento;
                                        }

                                        closeconnection($conn);

                                foreach ($selezione as $codice=> $elemento){
                                  ?>
                                  <!--<div class="col-12 col-sm-6 col-md-12 col-xl-6">-->
                                  <div class="single-products-catagory clearfix">
                                      <div class="single-product-wrapper">
                                        <a href="">

                                          <?php echo'<img src="img/product-img/'.$selezione[$codice]["codice"].'.jpg" alt="Product">'; ?>

                                          <!-- Product Meta Data -->
                                          <div class="product-description d-flex align-items-center justify-content-between">
                                              <div class="product-meta-data">
                                                <div class="ratings-review">
                                                    <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                    <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                    <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                    <i id="stella" class="fa fa-star" aria-hidden="true"></i>
                                                    <i id="stella" class="fa fa-star" aria-hidden="false"></i>
                                                </div>

                                                  <div class="line"></div>

                                                      <div class="product-price"><?php echo "€".$selezione[$codice]["prezzo"] ?></div>
                                                  <a href="product-details.html">
                                                         <h6><?php echo $selezione[$codice]["nome"]?></h6>
                                                  </a>
                                              </div>


                                          </div>
                                      </div>
                                  </div>
                              <?php  }}
                              $_GET["button_casa"]="";?>

                          <!--    ------------------------------------------------------------------------->




                          <!-- Single Product Area -->
                      </div>

                  <!-- Header Area End <div class="col-12 col-lg-4">

                  </div>-->

              </div>





        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                      <h2>Iscriviti per ottenere il <span>25% di sconto</span> sul prossimo ordine</h2>
                      <p>Teniamo a premiare i clienti fedeli, come te :).</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.html">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="product-details.html">Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart.html">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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

</body>

</html>
