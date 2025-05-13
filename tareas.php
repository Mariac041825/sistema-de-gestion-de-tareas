<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>
</head>
<body>
<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "base1");

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login1.php");
        exit;
    }

    $usuario_id = $_SESSION['usuario_id'];
    $result = $conn->query("SELECT * FROM tareas WHERE usuario_id = $usuario_id");

    echo "<table border='1'>";
    echo "<tr><th>Tarea</th><th>Descripción</th><th>Acciones</th></tr>";

    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>{$row['titulo']}</td>";
        echo "<td>{$row['descripcion']}</td>";
        echo "<td>
                <a href='editar_tarea.php?id={$row['id']}'>Editar</a> | 
                <a href='eliminar_tarea.php?id={$row['id']}'>Eliminar</a> | 
                <a href='completar_tarea.php?id={$row['id']}'>Marcar como completada</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
?>
<hr>
    <a href="nueva_tarea1.php">Nueva tarea</a> 
    <br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>