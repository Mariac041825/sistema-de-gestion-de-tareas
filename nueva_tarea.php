<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2> Crear tarea</h2>
<br>
<hr>
<form method="POST" action="nueva_tarea.php">
    <input type="text" name="titulo" placeholder="Título" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button type="submit">Crear Tarea</button>
</form>
<hr>
<br>
<a href="tareas.php">Ver tareas</a>
<br>
<a href="logout.php">Cerrar sesion</a>
</body>
</html>