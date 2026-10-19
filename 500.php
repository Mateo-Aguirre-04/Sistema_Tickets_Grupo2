<?php
http_response_code(500);
session_start();
session_unset();
session_destroy();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error 500</title>
    </head>
    <body>
        <h1> Error 500 Error del servidor</h1>
        <p> Ocurrió un problema con la base de datos o la conexion.</p>
        <p> <a href = "index.php"> Regresar a la página de inicio <a/></p>
        </body>
</html>