<?php
require_once 'Function_utility.php';
$id_db=4;
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
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Arredamento</a></li>
                                <li class="breadcrumb-item"><a href="#">Divani</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Divano marrone</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/4.jpg);">
                                    </li>

                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/4.jpg">
                                            <img class="d-block w-100" src="img/product-img/4.jpg" alt="First slide">
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
                                <p class="product-price">€390</p>
                                <a href="product-details.html">
                                    <h6>Elegante Divano da interno</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i style="color:grey" class="fa fa-star" aria-hidden="true"></i>

                                    </div>
                                    <div class="review">
                                        <a href="#"><?php $conn = openconnection();
                                        $migliorCommento="";
                                        $sql = "SELECT Commento FROM Recensioni WHERE ProdottiInVendita_idProdotto=$id_db && valutazione = (SELECT MAX(valutazione)FROM recensioni WHERE ProdottiInVendita_idProdotto=$id_db)";

                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        if($row!=null){
                                          $migliorCommento = $row['Commento'];

                                            echo "$migliorCommento";
                                        }

                                      ?></a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <?php
                                check_availability(4);
                                   ?>
                            </div>

                            <div class="short_overview my-5">
                                <p>Il nostro divano marrone incarna l'eleganza e il comfort, offrendo un'esperienza di seduta lussuosa e accogliente. Con la sua tonalità calda e sofisticata, il divano marrone aggiunge un tocco di raffinatezza e stile al tuo salotto o alla tua sala familiare.

Il design moderno e curato nei dettagli si fonde armoniosamente con diversi stili di arredamento, dal classico al contemporaneo. La sua silhouette equilibrata e le linee pulite conferiscono al divano un aspetto elegante e atemporale.Realizzato con materiali di alta qualità, il divano offre una struttura robusta e resistente. I cuscini imbottiti garantiscono una seduta confortevole e accogliente, mentre lo schienale e i braccioli ben imbottiti offrono un supporto ottimale.

La tonalità marrone del divano aggiunge calore e intimità all'ambiente circostante. Puoi abbinarlo a diverse tonalità e stili di arredamento, creando un punto focale attraente nel tuo spazio abitativo.

Il tessuto di rivestimento è morbido al tatto e resistente, garantendo una lunga durata nel tempo. I dettagli rifiniti con cura, come le cuciture eleganti e i piedini in legno, evidenziano l'attenzione per i dettagli e la qualità artigianale.Aggiungi un tocco di eleganza e comfort al tuo spazio con il nostro divano marrone.</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <?php $_SESSION["id_prod"] = ADD_TO_CART(4) ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            $id_db=4;
            include 'lascia_recensione.php';?>

        </div>
        <?php
        $id_db=4;
        include 'recensioni.php';
         ?>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php include "newsletter.php"; ?>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include "footer.php"; ?>
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
