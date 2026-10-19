<?php
session_start();
if(!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

http_response_code(400);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Error 400</title>
    </head>
    <body>
        <h3> Usuario logeado: <?php echo $_SESSION['nombre']; ?></h3>
        <p> <a href="cerrar_sesion.php">Cerrar sesión</a> </p> <br>


        <h1> Error 400 Solicitud incorrecta</h1>
        <p> Los datos contienen caracteres no permitidos.</p>
        <p> <a href = "registrar.php"> Regresar a registrar <a/></p>
        </body>
</html>