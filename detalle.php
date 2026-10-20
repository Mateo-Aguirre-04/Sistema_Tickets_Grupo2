<?php
session_start();

if(!isset($_SESSION['nombre']) && !isset($_SESSION['ID'])) {
    header("Location: index.php");
    exit();
}

include("conexion.php");
$idIncidencia = $_GET['id'];
$sqlI= "select * from incidencia WHERE id = $idIncidencia";
$resultadoI= mysqli_query($conexion,$sqlI);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Incidencias</title>
</head>
<body>
    <h1>Detalle de incidentes</h1>
    <h3> Usuario logeado: <?php echo $_SESSION['nombre']; ?></h3>

    <p><a href="cerrarsesion.php">Cerrar sesión</a></p>
    <a href="listar.php">Regresar a la lista de incidencias</a>
    <br>
    <br>
    
    <?php
        while ($filas = mysqli_fetch_array($resultadoI)) {
            echo "ID: " . $filas['id']. "<br>";
            echo "Nombre:" . $filas['nombre'] ."<br>";
            echo "Descripcion: " . $filas['descripcion']. "<br>";
            echo "Prioridad:" . $filas['prioridad'] ."<br><br>";           
        }
    ?>
    
</body>
</html>