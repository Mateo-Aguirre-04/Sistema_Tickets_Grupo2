<?php
session_start();
include("conexion.php");
$idUsuario = $_SESSION['ID'];
$sqlI= "select * from incidencia WHERE usuario_id = $idUsuario";
$resultadoI= mysqli_query($conexion,$sqlI);
?>

<html>
<head>
</head>
<body>
    <h1>Lista de incidentes</h1>
    <br>
    <br>
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