<?php
$conn = new mysqli("localhost", "root", "", "base1");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    
    $check_stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $check_stmt->bind_param("s", $correo);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "El usuario ya se encuentra registrado.";
    } else {
        
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $insert_stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("sss", $nombre, $correo, $hash);

        if ($insert_stmt->execute()) {
            echo "Usuario creado de manera exitosa.";
        } else {
            echo "Error: " . $insert_stmt->error;
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
    
}


$conn->close();


?>