<?php
require_once 'Function_utility.php';
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
                                <li class="breadcrumb-item"><a href="#">Sedie</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sedia EcoLine</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/Sedia_bianca_mod.jpg);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/Sedia_bianca_mod.jpg">
                                            <img class="d-block w-100" src="img/product-img/Sedia_bianca_mod.jpg" alt="First slide">
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
                                <p class="product-price">€80</p>
                                <a href="product-details.html">
                                    <h6>Sedia EcoLine</h6>
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
                                        <a href="sedia_bianca.html">Classica ed elegante</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->

                                <?php
                                check_availability(1);
                                   ?>
                          <!-- Write your comments here-->
                            </div>

                            <div class="short_overview my-5">
                                <p>La sedia EcoLine è un'opzione ecologica e funzionale per il tuo ambiente di lavoro o studio. Realizzata in plastica semi dura, ma riciclata, offre una soluzione sostenibile senza compromettere la durata e la resistenza. Il suo design ergonomico garantisce una postura corretta e confortevole durante le lunghe sessioni sedute. La sedia è dotata di uno schienale sagomato che si adatta alle curve naturali della schiena, offrendo sostegno e comfort ottimali. La sedia EcoLine presenta una base solida e stabile con una struttura leggera, che facilita il movimento e la mobilità. Con il suo stile minimalista e il contributo positivo all'ambiente attraverso l'utilizzo di materiali riciclati, la sedia EcoLine è una scelta ideale per chi cerca una soluzione ecologica senza rinunciare al comfort e al design.</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <?php $_SESSION["id_prod"] = ADD_TO_CART(1) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php
    include "newsletter.php"; ?>
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

</body>

</html>
