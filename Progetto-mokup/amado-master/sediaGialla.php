<?php
require_once 'Function_utility.php';
$id_db=5;
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
    <title>Amado - Furniture Ecommerce Template | Product Details</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <style media="screen">
        #stella {line-height: 0.1; color: #fbb710;}
    </style>

    <style>
    .container {
        display: flex;
        justify-content: center;
    }
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

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Soggiorno</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sedia Elegante</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/5.jpg);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/5.jpg">
                                            <img class="d-block w-100" src="img/product-img/5.jpg" alt="First slide">
                                        </a>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">€60</p>
                                <a href="">
                                    <h6>Sedia Elegante</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                  <div class="ratings">
                                    <?php $conn = openconnection();
                                    $migliorValutazione=0;
                                    $sql = "SELECT max(Valutazione) FROM Recensioni WHERE ProdottiInVendita_idProdotto=$id_db";

                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    if($row!=null){
                                      $migliorValutazione = $row['max(Valutazione)'];
                                      for($i=0;$i<$migliorValutazione;$i++){
                                        echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                      }
                                    }?>
                                  </div>
                                  <div class="review">
                                      <a href="#"><?php $conn = openconnection();
                                      $migliorCommento="";
                                      $sql = "SELECT Commento FROM Recensioni WHERE ProdottiInVendita_idProdotto=$id_db && valutazione = (SELECT MAX(valutazione)FROM recensioni WHERE ProdottiInVendita_idProdotto=$id_db)";

                                      $result = $conn->query($sql);
                                      $row = $result->fetch_assoc();
                                      if($row!=null){
                                        $migliorCommento = $row['Commento'];
                                        echo "$migliorCommento <br>";
                                          echo "<small style='color: red;'>Miglior commento</small><br>";
                                      }

                                    ?></a>
                                  </div>
                                </div>
                                <!-- Avaiable -->
                                <?php
                                check_availability(5);
                                   ?>
                            </div>

                            <div class="short_overview my-5">
                                <p>Se stai cercando di aggiungere un tocco di luce e stile al tuo ambiente, non cercare oltre! La nostra sedia giallo/oro è l'elemento perfetto per illuminare il tuo spazio e creare un'atmosfera accogliente e sofisticata. Con un design confortevole ed elegante, questa sedia si distingue per la sua bellezza senza tempo e la capacità di trasformare completamente la tua casa o ufficio.
                                La sedia giallo/oro è caratterizzata da un design contemporaneo, che unisce linee fluide e una silhouette ergonomica per garantire il massimo comfort. La sua seduta e lo schienale imbottiti offrono un supporto ottimale per lunghi periodi di seduta, mentre il rivestimento in tessuto giallo/oro conferisce un tocco di luminosità e calore all'ambiente circostante.
                              </p>
                            </div>

                            <!-- Add to Cart Form -->
                            <?php $_SESSION["id_prod"] = ADD_TO_CART(5) ?>
                        </div>
                        <br><br>
                    </div>
                </div>

            </div>
            <?php
            $id_db=5;
            include 'lascia_recensione.php';?>



            <!---------------------------------------------------------------------------------------------->

            <!---Recensioni-------->
</div>

        <?php
        $id_db=5;
        include 'recensioni.php';
         ?>



        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php include "newsletter.php"; ?>
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

</body>

</html>
