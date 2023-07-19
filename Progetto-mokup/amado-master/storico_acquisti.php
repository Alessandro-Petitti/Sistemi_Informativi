<?php
require_once 'db/config.php';
require_once 'db/database.php';
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);
unset($_SESSION["rimborso"]);
if (isset($_POST['azione']) && $_POST['azione']=="elimina_acquisto"){
  if(!empty($_SESSION["record_acquisti"])) {
     foreach($_SESSION["record_acquisti"] as $key => $value){
     if($_POST["nome_prod"] == $key && $_POST["data_acq"]==$value["data"]){
      $sql = "DELETE FROM Acquisti WHERE Utenti_idUtenti='" . $_SESSION["id_utente"] ."' AND
      ProdottiInVendita_idProdotto = '".$_SESSION["coppie_acquisto"][$_POST["nome_prod"]]["codice_p"]."'
      AND Data ='" . $_POST["data_acq"] ."' ";
      $connection = openconnection();
      $result = $connection->query($sql);
       closeconnection($connection);
      if(!$result){
        echo $conn ->error;
      }
    }
   }
 }
 unset($_SESSION["record_acquisti"]);
 unset($_SESSION["coppie_acquisto"]);
}

if (isset($_POST['azione']) && $_POST['azione']=="rimborso"){
  if(!empty($_SESSION["record_acquisti"])) {
     foreach($_SESSION["record_acquisti"] as $key => $value){
       //Ottieni dati del prodotto, una volta trovato elimina da acquisti e aggiorna il db
     if($_POST["nome_prod"] == $key && $_POST["data_acq"]==$value["data"]){
      /*$sql = "DELETE FROM Acquisti WHERE Utenti_idUtenti='" . $_SESSION["id_utente"] ."' AND
      ProdottiInVendita_idProdotto = '".$_SESSION["coppie_acquisto"][$_POST["nome_prod"]]["codice_p"]."'
      AND Data ='" . $_POST["data_acq"] ."' ";*/
      $connection = openconnection();
      /*$result1 = $connection->query($sql);*/
      $update = "UPDATE ProdottiInVendita
         SET Quantità = Quantità + " . $value["quantità"] . "
         WHERE idProdotto = '" . $_SESSION["coppie_acquisto"][$_POST["nome_prod"]]["codice_p"] . "'";
      $result2 = $connection->query($update);
      closeconnection($connection);
      if(/*$result1 &&*/ $result2 && $_POST["nome_prod"] == $key){
        $_SESSION["rimborso"][$_POST["nome_prod"]] = TRUE;

      }
    }
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
                               <h2>Acquisti fatti da: <?php echo $_SESSION['Username_utente'] ?></h2>
                               <h5>NB: eliminare un acquisto non prevede un risarcimento di alcun tipo ne resitutzione del prodotto.</h5>
                           </div>

                           <div class="cart-table clearfix">
                               <table class="table table-responsive">
                                   <thead>
                                       <tr>
                                           <th>Nome Utente</th>
                                           <th>Nome prodotto</th>
                                           <th>Quantità</th>
                                           <th>Data e ora</th>
                                           <th>Rimborso:</th>
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
                                         //recupero nome prodotto dal db
                                         $sql = "SELECT NomeProdotto FROM ProdottiInVendita WHERE idProdotto = '" . $prodotto . "'";
                                         $result2 = $conn->query($sql);
                                         $row2 = $result2->fetch_assoc();
                                         $nome_prod = $row2['NomeProdotto'];
                                         //definisco un array di coppie nome prodotto e codice
                                         $coppie = array(
                                           $nome_prod=>array(
                                              'codice_p' => $prodotto,
                                              'nome_prod' => $nome_prod
                                            )
                                          );
                                          //aggiungo la coppia parziale al'insieme delle coppie
                                         if(!isset($_SESSION["coppie_acquisto"])){
                                           $_SESSION["coppie_acquisto"] = $coppie;
                                         }
                                         else{
                                          $_SESSION["coppie_acquisto"] = $_SESSION["coppie_acquisto"] + $coppie;
                                        }

                                         $quantità = $row['Quantità'];
                                         $data = $row['Data'];
                                         $rimborso = FALSE;
                                         if(!isset($_SESSION["rimborso"])){
                                           $_SESSION["rimborso"]  = array(
                                             $nome_prod=>$rimborso
                                           );

                                         }
                                         
                                         $rimborso_no = "non richiesto";
                                         $rimborso_si = "Rimborso in attesa di approvazione";
                                         //dati dell'acquisto
                                         $acquisto = array(
                                         	$nome_prod=>array(
                                         	'nome_utente'=>$nome,
                                         	'nome_prod'=>$nome_prod,
                                         	'quantità'=>$quantità,
                                         	'data'=>$data,
                                          'rimborso' => $rimborso)
                                         );

                                         //aggiungo l'acquisto al totale degli acquisti
                                         if(!isset($_SESSION["record_acquisti"])){
                                           $_SESSION["record_acquisti"] = $acquisto;
                                         }
                                         else{
                                           $array_keys = array_keys($_SESSION["record_acquisti"]);
                                           if(!in_array($nome_prod,$array_keys)){
                                           $_SESSION["record_acquisti"] =$_SESSION["record_acquisti"] + $acquisto;
                                         }
                                       }
                                         echo "
                                             <td class=' cart_product_desc'>
                                                  $nome
                                             </td>
                                             <td class=' cart_product_desc'>
                                                  $nome_prod
                                             </td>
                                             <td class=' cart_product_desc'>
                                                  $quantità
                                             </td>
                                             <td class=' cart_product_desc'>
                                                   $data
                                             </td>";
                                             if(isset($_SESSION["rimborso"][$nome_prod]) && $_SESSION["rimborso"][$nome_prod] == TRUE){
                                               echo"<td class=' cart_product_desc'>
                                                 $rimborso_si
                                               </td>";
                                             }
                                             else{
                                               echo"
                                             <td class=' cart_product_desc'>
                                               $rimborso_no
                                             </td>";}
                                             echo"
                                             <td class='cart_product_desc'>
                                               <form method='post' action='storico_acquisti.php'>
                                               <input type='hidden' name='nome_prod' value='$nome_prod' />
                                               <input type='hidden' name='data_acq' value='$data'/>
                                               <input type='hidden' name='azione' value='elimina_acquisto'/>
                                               <button type='submit' class='btn amado-btn w-100'>Elimina acquisto</button>
                                               </form>
                                             </td>
                                             <td class='cart_product_desc'>
                                               <form method='post' action='storico_acquisti.php'>
                                               <input type='hidden' name='nome_prod' value='$nome_prod' />
                                               <input type='hidden' name='data_acq' value='$data'/>
                                               <input type='hidden' name='azione' value='rimborso'/>
                                               <button type='submit' class='btn amado-btn w-100'>Chiedi un rimborso</button>
                                               </form>
                                             </td>";

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
