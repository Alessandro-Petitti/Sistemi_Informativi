<?php
if (isset($_GET['login'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
</head>
<body>
    <center>
      <img src="./zalone.png" alt="">
      <p><a href="?login">Login</a></p>
    </center>
</body>
</html>
