<?php
  //Funzione Login: se l'username e la password corrispondono ai dati,
  //restituisce l'username inserito, altrimenti restituisce una stringa vuota
  function login($username, $password) {
    $users = get_users();
    $user_check = "";

    foreach ($users as $user) {
        if ($user["username"] == $username) {
            if ($user["password"] == $password) {
                return $username;
            }
            $user_check = "";
            break;
        }
    }

    if ($user_check === "") {
        $user_check = "";
    }

    return $user_check;
}

  function check_login(){
    // Verifica se l'utente ha effettuato l'accesso
    if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
        // L'utente è già autenticato, redirect alla pagina protetta
        header('Location: pagina_protetta.php');
        exit;
    }
  }

  function session_duration($duration_in_seconds){
    session_set_cookie_params($duration_in_seconds);
  }

  function check_session_time($session_duration){
    //time() è una funzione built-in che restituisce il timestamp corrente come un valore intero
    if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $session_duration) {
        // La sessione è scaduta, distruggila
        session_unset();
        session_destroy();

        // Redirect alla pagina di login
        header('Location: login.php');
        exit; //termina immediatamente l'esecuzione dello script corrente.
    }
  }

  function logout() {
    // Avvia la sessione
    session_start();

    // Rimuovi tutte le variabili di sessione
    session_unset();

    // Distruggi la sessione
    session_destroy();

    // Redirect alla pagina di login
    header('Location: login.php');
    exit;
  }

  function registra_utente($username, $password) {
      $json_file = '/Users/federicobini/Desktop/utenti.json';
      // Leggi il contenuto del file JSON
      $json_content = file_get_contents($json_file);
      // Converti il JSON in un array associativo
      $array = json_decode($json_content, true);
      if ($array === null) {
          return false;
      }
      // Aggiungi un nuovo elemento all'array
      $newUser = [
          "username" => $username,
          "password" => $password
      ];
      $array[] = $newUser;
      // Codifica l'array in formato JSON
      $jsonUpdated = json_encode($array);
      // Sovrascrivi il contenuto del file JSON con il nuovo contenuto
      $result = file_put_contents($json_file, $jsonUpdated);
      if ($result === false) {
          return false;
      }
      return true;
  }

  function password_is_same($password1, $password2) {
    return $password1 === $password2;
  }

  function get_users(){
    $json_file = '/Users/federicobini/Desktop/utenti.json';
    // Leggi il contenuto del file JSON
    $json_content = file_get_contents($json_file);
    // Converti il JSON in un array associativo
    $array = json_decode($json_content, true);
    // Verifica se la decodifica del JSON ha avuto successo
    if ($array === null) {
        echo "Errore nella decodifica del JSON";
        return [];
    }
    return $array;
  }
?>
