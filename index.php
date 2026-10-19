<?php 

session_start(); 

include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuarioIngresado = $_POST['usuario'];
    $claveIngresada = $_POST['clave'];

    $consultaUsuario = "SELECT * FROM usuario WHERE usuario = '$usuarioIngresado' AND clave = '$claveIngresada'";
    $resultadoConsulta = mysqli_query($conexion, $consultaUsuario);
    $datosUsuario = mysqli_fetch_array($resultadoConsulta);

    if ($datosUsuario) {
        $_SESSION['ID'] = $datosUsuario['id'];           
        $_SESSION['nombre'] = $datosUsuario['nombre'];   
        $_SESSION['usuario'] = $datosUsuario['usuario'];

        header("Location: listar.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema de Incidencias</title>
</head>
<body>
    <h1>Sistema de Incidencias</h1>
    <h2>Acceso al Sistema</h2>
    
    <form action="index.php" method="POST">
        <fieldset>
            Usuario <br>
            <input type="text" name="usuario" required/><br>
            Clave:<br>
            <input type="password" name="clave" required/>
            <br><br>
            <input type="submit" value="Ingresar"/>
        </fieldset>
    </form>
</body>
</html>