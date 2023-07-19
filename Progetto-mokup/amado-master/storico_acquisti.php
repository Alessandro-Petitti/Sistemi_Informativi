<?php
require_once 'db/config.php';
require_once 'db/database.php';
session_start();?>
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
                               <h2>Acquisti fatti da: <?php echo $_SESSION['Username_utente'] ?></h2>
                           </div>

                           <div class="cart-table clearfix">
                               <table class="table table-responsive">
                                   <thead>
                                       <tr>
                                           <th>Nome Utente</th>
                                           <th>Nome prodotto</th>
                                           <th>Quantità</th>
                                           <th>Data e ora</th>
                                       </tr>
                                   </thead>

                                   <tbody>
                                     <?php
                                     $conn = openconnection();
                                     $sql = "SELECT * FROM Acquisti WHERE Utenti_idUtenti='" . $_SESSION["id_utente"] . "'";
                                     $result = $conn->query($sql);
                                     if(!$result){
                                         echo $conn ->error;
                                     }
                                     $nome = $_SESSION['Username_utente'];

                                     while ($row = $result->fetch_assoc()) {
                                         $prodotto = $row['ProdottiInVendita_idProdotto'];
                                         $sql = "SELECT NomeProdotto FROM ProdottiInVendita WHERE idProdotto = '" . $prodotto . "'";
                                         $result2 = $conn->query($sql);
                                         $row2 = $result2->fetch_assoc();
                                         $nome_prod = $row2['NomeProdotto'];
                                         $quantità = $row['Quantità'];
                                         $data = $row['Data'];
                                         echo '
                                             <td class="cart_product_desc">
                                                 ' . $nome . '
                                             </td>
                                             <td class="cart_product_desc">
                                                 ' . $nome_prod . '
                                             </td>
                                             <td class="cart_product_desc">
                                                 ' . $quantità . '
                                             </td>
                                             <td class="cart_product_desc">
                                                 ' . $data . '
                                             </td>
                                             ';
                                         ?>
                                   </tbody>
                                 <?php };
                                 closeconnection($conn); ?>
                               </table>
                           </div>
                       </div>
                     </div>
                   </div>
                 </div>

                   </body>
                   </html>
