<br><br><br>
<form method="POST">
 <?php
 //$id_db=5;
 // Controllo se l'utente è loggato
 if (isset($_SESSION['Username_utente'])) {
     // Recupero l'ID dell'utente dalla sessione
     $user_id = $_SESSION['Username_utente'];
     echo "<h3>Lascia una recensione per questo prodotto!</h3>";
     // Includo un campo nascosto per l'ID dell'utente
     echo "<input type='hidden' name='user_id' value='$user_id'>";
     echo "<input type='hidden' name='prod_id' value='$id_db'>";
     echo "<input type='hidden' name='date' value='" . date('m-d-Y') . "'>";
 } else {
     // L'utente non è loggato, mostra un messaggio di avviso o reindirizza all'accesso
echo "<h3>Vuoi lasciare una recensione per il prodotto? Esegui il <span onclick=\"window.location.href = 'login_section/login.php';\" style=\"cursor: pointer; color:blue;\">Login</span></h3>"; }
 ?>
 <?php if (isset($_SESSION['Username_utente'])){?>

 <label for="commento">Commento:</label><br>
 <textarea id="commento" name="commento" rows="4" cols="70"></textarea><br>

 <label for="votazione">Valutazione:</label><br>
 <select id="votazione" name="votazione">
   <option value="1">1 stella</option>
   <option value="2">2 stelle</option>
   <option value="3">3 stelle</option>
   <option value="4">4 stelle</option>
   <option value="5">5 stelle</option>
 </select><br>
 <br><br>

 <input type="submit" value="Invia recensione">
</form>
<?php }; ?>

<?php if(isset($_POST["commento"]) && isset($_POST["votazione"])){
 $conn = openconnection();
  $a=$_POST["user_id"];
 $sql="SELECT idUtenti from Utenti where Username = '$a'";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $id_utente = $row['idUtenti'];
 $b=$_POST["prod_id"];
 $c=$_POST["date"];
 $d=$_POST["votazione"];
 $e=$_POST["commento"];
 $sql = "INSERT INTO Recensioni (Utenti_idUtenti, ProdottiInVendita_idProdotto, Data, Valutazione, Commento)
VALUES ('$id_utente', '$b', STR_TO_DATE('$c', '%m-%d-%Y'), '$d', '$e')";
// Esegui la query di inserimento

// Nessuna recensione duplicata, procedi con l'inserimento
$result =$conn->query($sql);
$row_count = mysqli_affected_rows($conn);

// Verifica se la query di inserimento è stata eseguita con successo
if ($row_count>0) {
    echo "Recensione inserita con successo!";
} else {
    echo "<h1>Si è verificato un errore durante l'inserimento della recensione.<h1>";
}

// Chiusura della connessione al database
closeconnection($conn);
}
?>
