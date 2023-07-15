<?php
require_once 'Function_utility.php';
//session_start();
/*function check_login(){
    // Verifica se l'utente ha effettuato l'accesso
    if (isset($_SESSION['Username_utente']) && $_SESSION['Username_utente'] != "") {
        return TRUE;
    }
  }*/

    ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <header class="header-area clearfix">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <!-- Amado Nav -->
        <?php
        if (check_login()==TRUE)
        {
           include 'nav_loggato.php';
        }
        else
        {
           include 'nav.php';
        }
         ?>

        <!-- Cart Menu -->

        <!-- Social Button -->
    </header>
  </body>
</html>
