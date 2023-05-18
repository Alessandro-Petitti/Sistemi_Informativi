<?php
require_once 'funzionilogin.php';
// Imposta il tempo di scadenza della sessione a 120 secondi
$time_session=120;
session_duration($time_session);

// Avvia la sessione
session_start();


// Verifica se la sessione è scaduta

check_session_time($time_session);

// Aggiorna il timestamp dell'ultima attività
$_SESSION['last_activity'] = time();

// Verifica se l'utente ha effettuato l'accesso
check_login();

// Verifica se è stato inviato il form di login
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user=login($_POST['username'],$_POST['password']);
    // Controlla se le credenziali sono corrette
    if($user!=""){
        // Autenticazione riuscita, impostiamo la variabile di sessione
        $_SESSION['username'] = $user;
        // Redirect alla pagina protetta
        header('Location: pagina_protetta.php');
        exit;
    } else {
        // Credenziali errate, mostra un messaggio di errore
        $error = "Credenziali errate. Riprova.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(isset($error)): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
