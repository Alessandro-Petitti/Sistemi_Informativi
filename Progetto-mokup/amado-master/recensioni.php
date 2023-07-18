
<?php

$conn = openconnection();
$sql = "SELECT * FROM Recensioni WHERE ProdottiInVendita_idProdotto=$id_db";
$result = $conn->query($sql);
$recensioni = array(); // Inizializza l'array selezione

while ($row = $result->fetch_assoc()) {
  $autore = $row['Utenti_idUtenti'];
  $prodotto = $row['ProdottiInVendita_idProdotto'];
  $data = $row['Data'];
  $valutazione = $row['Valutazione'];
  $commento=$row['Commento'];

  // Aggiungi l'elemento corrente a $selezione
  $elemento = array(
    'autore' => $autore,
    'prodotto' => $prodotto,
    'data' => $data,
    'valutazione' => $valutazione,
    'commento' => $commento
  );

  // Aggiungi l'elemento corrente a $selezione
  $recensioni[$autore] = $elemento;
}

closeconnection($conn);

if(count(array_keys($recensioni))==0){
  echo "<div class='container'>
    <h1><span style='color: #fbb710;''>Sembra che il prodotto non abbia ancora recensioni!</span><h1>
</div>";
}else{
  echo "<div class='container'>
    <h1><span style='color: #fbb710;''>Recensioni</span><h1>
</div> <br><br><br><br><br><br>";
}



if(count(array_keys($recensioni))!=0){
?>
<div class="container">
  <table class="table table-responsive">
    <thead>
        <tr>
            <th>    </th>
            <th><h5><span style="color: #fbb710;">Nome</span></h5></th>
            <th><h5><span style="color: #fbb710;">Commento</span></h5></th>
            <th><h5><span style="color: #fbb710;">Valutazione</span></h5></th>
            <th><h5><span style="color: #fbb710;">Data</span></h5></th>
            <th><h5><span style="color: #fbb710;">Stelle</span></h5></th>
        </tr>
    </thead>
    <tbody>
  <?php
foreach ($recensioni as $rec=> $elemento){

  $conn = openconnection();
  $sql = "SELECT Nome, Cognome FROM Utenti WHERE idUtenti=".$elemento['autore'];
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $nome = $row['Nome'];
  $cognome = $row['Cognome'];
  $nomeCompleto=$nome." ".$cognome;
  ?>
  <tr>
      <td>
        <img src="img/core-img/utente.png" alt="Utente">
      </td>
      <td>
        <?php echo'<h5>'. $nomeCompleto.' </h5>';  ?>
      </td>
      <td><?php  echo'<h5>'. $elemento['commento'].' </h5>'; ?></td>
      <td><?php  echo'<h5>'. $elemento['valutazione']."/5 stelle".' </h5>'; ?></td>
      <td>  <?php  echo'<h5>'. $elemento['data'].' </h5>'; ?></td>
      <td>  <div class="product-description d-flex align-items-center justify-content-between">
          <div class="product-meta-data">
            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                <div class="ratings">
              <?php
              for($i=0;$i<$elemento['valutazione'];$i++){
                echo '<i class="fa fa-star" aria-hidden="true"></i>';
              };?>
              </div>
            </div>
          </div>


      </div></td>
  </tr>
  <tr>
    <td></td>
  </tr>
<?php
$ultimoCommento = $elemento['commento'];
};?>
</tbody>
</table>
</div>
<?php }; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .container {
        display: flex;
        justify-content: center;
    }
    </style>
  </head>
  <body>

  </body>
</html>
