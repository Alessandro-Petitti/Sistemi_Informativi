
<!DOCTYPE html>
<html>
<head>
    <title>Area utente</title>
    <style>
           body {
               display: flex;
               justify-content: center;
               align-items: center;
               height: 100vh;
               background-color: lightblue;
           }

           .button-container {
               display: grid;
               grid-template-columns: repeat(2, 1fr);
               grid-gap: 2rem;
               justify-content: center;
               align-items: center;
           }

           .button {
               width: 150px;
               height: 150px;
               border-radius: 50%;
               background-color: #eaeaea;
               display: flex;
               justify-content: center;
               align-items: center;
               font-size: 20px;
               font-weight: bold;
               color: #333;
               cursor: pointer;
               transition: background-color 0.3s ease;
           }

           .button:first-child {
               justify-self: start;
               align-self: start;
           }

           .button:nth-child(2) {
               justify-self: end;
               align-self: start;
           }

           .button:nth-child(3) {
               justify-self: start;
               align-self: end;
           }

           .button:last-child {
               justify-self: end;
               align-self: end;
           }

           .button:hover {
               background-color: #ccc;
           }


       </style>
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div class="button-container">
      <div class="btn amado-btn mb-15">
        <a href="indexpaginaprotetta.php"><button class="btn amado-btn mb-15" type="submit" name="home">Home</button></a>
      </div>
        <div class="btn amado-btn mb-15">
          <a href="storico_acquisti.php"><button class="btn amado-btn mb-15" type="submit" name="home">Storico acquisti</button></a>
        </div>
        <div class="btn amado-btn mb-15">
          <form method="POST" action="indexpaginaprotetta.php">
            <button class="btn amado-btn mb-15" type="submit" name="button_elimina_account">Elimina acquisto</button>
          </form>
        </div>
        <div class="btn amado-btn mb-15">
          Richiedi un rimborso
        </div>
        <div class="btn amado-btn mb-15">
          <form method="POST" action="index.php">
            <button class="btn amado-btn mb-15" type="submit" name="button_elimina_account">Elimina account</button>
          </form>
        </div>
    </div>
    </div>

            <!-- ##### Newsletter Area Start ##### -->


            <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
            <script src="js/jquery/jquery-2.2.4.min.js"></script>
            <!-- Popper js -->
            <script src="js/popper.min.js"></script>
            <!-- Bootstrap js -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Plugins js -->
            <script src="js/plugins.js"></script>
            <!-- Active js -->
            <script src="js/active.js"></script>
</body>
</html>
