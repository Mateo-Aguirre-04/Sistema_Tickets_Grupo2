<?php
session_start();

if(!isset($_SESSION['nombre']) && !isset($_SESSION['ID'])) {
    header("Location: index.php");
    exit();
}

include("conexion.php");
$idUsuario = $_SESSION['ID'];
$sqlI= "select * from incidencia WHERE usuario_id = $idUsuario";
$resultadoI= mysqli_query($conexion,$sqlI);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Incidencias</title>
</head>
<body>
    <h1>Lista de incidentes</h1>
    <h3> Usuario logeado: <?php echo $_SESSION['nombre']; ?></h3>
    
    <p><a href="cerrarsesion.php">Cerrar sesión</a></p>
    <a href="registrar.php">Registrar una nueva incidencia</a>
    <br>
    <br>

    <?php
        while ($filas = mysqli_fetch_array($resultadoI)) {
            echo "-ID: " . $filas['id']. "<br>";
            echo "  Nombre: <a href='detalle.php?id=".$filas['id']."'>" . $filas['nombre'] . "</a>"."<br><br>";
        }
    ?>  
</body>
</html>