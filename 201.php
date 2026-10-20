<?php 
session_start();

if(!isset($_SESSION['nombre']) && !isset($_SESSION['ID'])) {
    header("Location: index.php");
    exit();
}

http_response_code(201);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Creado</title>
    </head>
    <body>
        <h3> Usuario logeado: <?php echo $_SESSION['nombre']; ?></h3>
        <p> <a href="cerrarsesion.php">Cerrar sesión</a> <br><br>

        <h1> Incidencia creada - 201 Created</h1>
        <p> <a href="listar.php">Ir a la lista de incidencias</a></p>
        </body>
</html>
