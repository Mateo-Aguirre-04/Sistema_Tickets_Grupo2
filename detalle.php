<?php
session_start();
include("conexion.php");
$idIncidencia = $_GET['id'];
$sqlI= "select * from incidencia WHERE id = $idIncidencia";
$resultadoI= mysqli_query($conexion,$sqlI);
?>

<html>
<head>
</head>
<body>
    <h1>Detalle de incidentes</h1>
    <br>
    <br>
    <a href="listar.php">Regresar a la lista de incidencias</a>
    <br>
    <br>
    
    <?php
        while ($filas = mysqli_fetch_array($resultadoI)) {
            echo "ID: " . $filas['id']. "<br>";
            echo "Nombre:" . $filas['nombre'] ."<br><br>";
            echo "Descripcion: " . $filas['descripcion']. "<br>";
            echo "Prioridad:" . $filas['prioridad'] ."<br><br>";           
        }
    ?>
    
</body>
</html>