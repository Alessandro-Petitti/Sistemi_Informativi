<?php
require_once 'funzionilogin.php';
// Avvia la sessione
session_start();
// Verifica se l'utente ha effettuato l'accesso

if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
    // L'utente non è autenticato, redirect alla pagina di login
    //header('Location: login.php');
    header('Location: error_page.php');
    exit;
}
// Utilizzo della funzione di logout
if (isset($_GET['logout'])) {
    logout();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagina Protetta</title>
</head>
<body>
    <h1>Benvenuto, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Questa è una pagina protetta.</p>
<!--
?logout è una query string che viene aggiunta all'URL per passare un parametro denominato "logout".
Nell'esempio precedente, viene utilizzata per segnalare che l'utente ha fatto clic sul link di logout.
Quando viene aggiunto ?logout all'URL della pagina corrente, ad esempio pagina_protetta.php?logout,
il parametro logout diventa disponibile nella variabile superglobale $_GET di PHP.
Questo consente di controllare se il parametro logout è stato passato nell'URL.
-->
    <p><a href="?logout">Logout</a></p>
</body>
</html>
