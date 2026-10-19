<?php
session_star();
include("conexion.php");

$error = "";

if($_SERVER['REQUEST?METHOD']=="POST"){
    $usuarioIngresado = $_POST['usuario'];
    $claveIngresada =$_POST['clave'];

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuarioIngresado' AND clave = '$claveIngresa'";
    $resultado = mysqli_connect($conexion, $sql);

    $user = mysqli_fetch_array($resultado);

    if($user){
        $_SESSION['ID'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario'];

        header("Location: listar.php");
        exit;
    
    }else{
        $error = "Ussuario o contrase;a incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login - Sistema de bd_incidencias</title>
    </head>
    <body>
        <!--Encabezados visuales estructurados igual a los del profe en su index.php-->
        <h1>Sistemas de Incidencia Tecnica</h1>
        <h2>Acceso al sistemas</h2>

        <!-- si existe un mensaje de error, lo mostramos en color rojo antes del formulario -->
        
        <?php if(!empy($error)): ?>
        <p style="color: red;><?php echo $error; ?></p>
        <?php endif; ?>

        <!--Formulario identico en estructura al index.php de la clase, enviado por POST a si mismo -->
        <form action= "index.php" method="POST">
            <fieldset>
                usuario<br>
                <input type="text" name="usuario" required><br>
                clave:<br>
                <input type="password" name="clave" required><br>
                <br><br>
                <input type="submit" value="Ingresar">
            </fieldset>
        </form>
    </body>
</html>