<?php
require_once 'db/config.php';
require_once 'db/database.php';
   session_start();

          function password_is_same($password1, $password2) {
            return $password1 === $password2;
          }



          if(isset($_POST["Username"]) && $_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['Provenience'] == 'register')
          {
              //creo un array associativo con tutti i valori che ho passato dal form riprelevati in POST
              //i nomi dell'array associativo potrebbero anche essere diversi
              $com = array(
                  "name"            =>    $_REQUEST["name"],
                  "cognome"         =>    $_REQUEST["cognome"],
                  "Username"        =>    $_REQUEST["Username"],
                  "email"           =>    $_REQUEST["email"],
                  "dataDiNascita"   =>    $_REQUEST["dataDiNascita"],
                  "password"        =>    $_REQUEST["password"],
                  "password_c"      =>    $_REQUEST["password_confirm"]
              );
              $conn = openconnection();
              $sql = "SELECT * FROM Utenti u WHERE u.Username='".$com["Username"]."'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $_SESSION['username_già_in_uso'] = 'Si';
                header("location: login_section/register.php");
              }
              elseif($result->num_rows == 0)
              {
                  if(password_is_same($com["password"],$com["password_c"] )== TRUE)
                  {
                      //Attenzione ai valori numerici ed ai valori stringa!!
                      //Verifica per capire la differenza
                      //(apice si per le stringhe, apice no per gli interi o i campi chiave)
                      $sql="INSERT INTO Utenti (Nome, Cognome, Username, Email, DataDiNascita, Password)
                      VALUES ('".$com["name"]."',
                              '".$com["cognome"]."',
                              '".$com["Username"]."',
                              '".$com["email"]."',
                              '".$com["dataDiNascita"]."',
                              '".$com["password"]."'
                      )";
                      $result = $conn->query($sql);
                      if ($result==TRUE)
                      {
                        $message_add="Utente inserito";
                        $_SESSION['Username_utente'] = $com['Username'];
                      }
                      else
                      {
                        $message_add="Errore del Server: Utente non inserito";
                      }
                      closeconnection($conn);
                      if(isset($message_add))
                      {
                        echo "<script>alert('Utente correttamente inserito nel database')</script>";
                      }
                  }
                 else
                 {
                  $_SESSION['password_status'] = 'No';
                  header("location: login_section/register.php");
                }
              }
        }
        elseif(isset($_POST["Username"]) && $_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['Provenience'] == 'login')
         { //Controllo per il login
          $com = array(
              "Username"        =>    $_REQUEST["Username"],
              "password"        =>    $_REQUEST["password"],
          );
          $conn = openconnection();
          $sql = "SELECT * FROM Utenti u WHERE u.Username='".$com["Username"]."' AND u.Password='".$com["password"]."'";
          $result = $conn->query($sql);
          if ($result->num_rows ==0 ) {
              $_SESSION['login_status'] = 'No';
              header("location: login_section/login.php");
          }
          $_SESSION['Username_utente'] = $com['Username'];
          closeconnection($conn);
        }

          ?>

          <?php

          if (isset($_POST['set_provenience'])) {
              $_SESSION['Provenience'] = 'cart';
          }

          if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['Provenience'] == 'cart'){
            echo "<script>
            alert('Hello! I am an alert box!!');
             </script>";

             $_SESSION["Provenience"] = 0;
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
    <title>Luminaire - Lighting elegance</title>

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
    <!-- Search Wrapper Area End-->
    <!--   -->
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo.png" alt="" ></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <?php include 'header.php'; ?>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="sedia_bianca.php">
                        <img src="img/product-img/Sedia_bianca_mod.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €80</p>
                            <h4>Sedia EcoLine</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="lampada.php">
                        <img src="img/product-img/lampada.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €180</p>
                            <h4>Lampada Elegante</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="setdivasi.php">
                        <img src="img/product-img/setdivasi.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €90</p>
                            <h4>Set di Vasi</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="divanomarrone.php">
                        <img src="img/product-img/divanomarrone.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €390</p>
                            <h4>Divano Marrone</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Orologio.php">
                        <img src="img/product-img/Orologio_antico.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €450</p>
                            <h4>Orario classico</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="sediaGialla.php">
                        <img src="img/product-img/sediaGialla.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €60</p>
                            <h4>Sedia Elegante</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="sedia2dilegno.php">
                        <img src="img/product-img/sediadilegno.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €40</p>
                            <h4>Sedia di Legno</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="divanoModerno.php">
                        <img src="img/product-img/divanoModerno.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €380</p>
                            <h4>Divano Moderno</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="Piantana.php">
                        <img src="img/product-img/Piantana_bianca.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €318</p>
                            <h4>piantana WoodGlow</h4>
                        </div>
                    </a>
                </div>


                <div class="single-products-catagory clearfix">
                    <a href="orologiocomodino.php">
                        <img src="img/product-img/orologiocomodino.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €15</p>
                            <h4>Orologio da comodino</h4>
                        </div>
                    </a>
                </div>

                <div class="single-products-catagory clearfix">
                    <a href="lampada_studio.php">
                        <img src="img/product-img/lamp.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €80</p>
                            <h4>Lampada Da Studio</h4>
                        </div>
                    </a>
                </div>

                <div class="single-products-catagory clearfix">
                    <a href="vasobianco.php">
                        <img src="img/product-img/vasobianco.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €60</p>
                            <h4>Vaso Bianco</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory clearfix">
                    <a href="coppiadivasi.php">
                        <img src="img/product-img/coppiadivasi.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €45</p>
                            <h4>Coppia di Vasi</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory clearfix">
                    <a href="divanoverde.php">
                        <img src="img/product-img/divanoverde.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €480</p>
                            <h4>Divano Verde</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory clearfix">
                    <a href="orologiolegno.php">
                        <img src="img/product-img/orologiolegno.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Da €50</p>
                            <h4>Orologio da parete</h4>
                        </div>
                    </a>
                </div>


            </div>
        </div>
        <!-- Product Catagories Area End -->
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
                            <input type="email" name="email" class="nl-email" placeholder="Inserisci l'email">
                            <input type="submit" value="Iscriviti">
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
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-4 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                          <div class="social-info d-flex justify-content-between">
                            <a style="color:red"; href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a style="color:purple"; href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a style="color:blue"; href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a  style="color:white"; href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          </div>
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
