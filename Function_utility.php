<?php
session_start();
function check_login(){
    // Verifica se l'utente ha effettuato l'accesso
    if (isset($_SESSION['Username_utente']) && $_SESSION['Username_utente'] != "") {
        return TRUE;
    }
  }
 ?>
