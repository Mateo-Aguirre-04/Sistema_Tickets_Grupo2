<?php 
session_start();

if(!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];

    $usuario_id = $_SESSION['usuario_id'] ?? 1;

    if (strpos($nombre, '$') !== false) || strpos($nombre, '\\') !== false || strpos($nombre, '=') !== false 
    || strpos ($descripcion, '$') !== false || strpos($descripcion, '[') !== false || strpos($descripcion, ']') !== false 
    || strpos ($descripcion, '\\') !== false || strpos ($descripcion, '=') !== false{
        
    header("Location: 400.php");
    exit()
    
    }

    $sql = "INSERT INTO incidencia (nombre, descripcion, prioridad, usario_id) VALUES ('$nombre', '$descripcion',
    '$prioridad', '$usuario_id')";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado) {
        header("Location: 201.php");
        exit();
    } else {
        header ("Location: 500.php")
        exit();
    }

}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Incidencia</title>
</head>
<body>
    <h1> Sistema de Incidencias</h1>
    <h3> Usuario logeado: <?php echo $_SESSION['nombre']; ?></h3>
    <p> <a href="cerrar_sesion.php">Cerrar sesión</a> | <a href="listar.php">Listar incidencias</a></p> <br>

    <h2>Registrar Nueva Incidencia</h2>
    <form action= "registrar.php" method= "POST">
        <label> Nombre: </label> <br>
        <input type="text" name="nombre" required> <br>

        <label> Descripción: </label> <br>
        <textarea name="descripcion" required></textarea> <br>

        <label> Prioridad: </label> <br>
        <select name="prioridad" required>
            <option value="Baja">Baja</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
        </select> <br><br>

        <input type="submit" value="Guardar Incidencia">
    </form>
<p> <a href="listar.php">Volver a la lista de incidencias</a></p>
</body>
</html>
