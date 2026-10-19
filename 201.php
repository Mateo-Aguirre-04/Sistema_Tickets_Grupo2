<? php 
session_start();
if(!isset($_SESSION['nombre'])) {
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
        <p> <a href="cerrar_sesion.php">Cerrar sesión</a> <br><br> <a href="listar.php">Listar incidencias</a></p> <br>

        <h1> Incidencia creada correctamente</h1>
        <p> <a href="listar.php">Ir a la lista de incidencias</a></p>
        </body>
</html>
