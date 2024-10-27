<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Consulta de inserción con verificación de duplicados
    $stmt = $conn->prepare("INSERT IGNORE INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['mensaje'] = "Usuario registrado correctamente.";
        } else {
            $_SESSION['mensaje'] = "El usuario ya existe.";
        }
    } else {
        $_SESSION['mensaje'] = "Error al registrar el usuario.";
    }

    $stmt->close();
    $conn->close();

    // Redirigir a la página usuario.php
    header("Location: usuario.php");
    exit();
}
?>


