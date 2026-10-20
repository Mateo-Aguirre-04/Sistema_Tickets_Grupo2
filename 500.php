<?php
http_response_code(500);
session_start();
if(!isset($_SESSION['nombre']) && !isset($_SESSION['ID'])) {
    header("Location: index.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error 500</title>
    </head>
    <body>
        <h3> Usuario logeado: <?php echo $_SESSION['nombre']; ?></h3>

        <h1> Error 500 - Internal Server Error</h1>
        <p> <a href = "cerrarsesion.php"> Dirigirse al login <a/></p>
        </body>
</html>