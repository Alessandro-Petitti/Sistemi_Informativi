<?php
  /*
  -La funzione prende come parametro una variabile globale $cfg,
  che contiene le configurazioni di connessione al database come dbhost (host del database),
  dbuser (utente del database), dbpwd (password del database) e dbname (nome del database).

  -La funzione utilizza la classe mysqli per creare una nuova connessione al database
  utilizzando i valori delle configurazioni fornite.

  -Se la connessione al database fallisce, viene generato un errore e
  viene visualizzato un messaggio di errore, altrimenti restituisce l'oggetto di connessione.
  */
  function openconnection(){
    global $cfg;
    $conn = new mysqli($cfg['dbhost'], $cfg['dbuser'], $cfg['dbpwd'], $cfg['dbname']);
    //La freccia (->) in PHP viene utilizzata per accedere a metodi e proprietà di un oggetto.
    if ($conn->connect_error) {
        //In PHP, die() è una funzione che viene utilizzata per terminare immediatamente
        //l'esecuzione di uno script e
        //visualizzare un messaggio di errore specificato dall'utente.
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

  function closeconnection($myconnection){
    $myconnection->close();
  }
 ?>
