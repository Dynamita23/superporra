<?php
include 'conexion.php';
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar y ejecutar la consulta para comprobar el usuario
    $stmt = $conn->prepare("SELECT nombre, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Verificar la contraseña
        $stmt->bind_result($nombre, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Inicio de sesión correcto: guardar el nombre en la sesión y redirigir
            $_SESSION['nombre'] = $nombre;
            header("Location: crear_equipo_spm.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Correo electrónico no encontrado";
    }
    $stmt->close();
    $conn->close();
    // Validación exitosa del login

$_SESSION['usuario_id'] = $usuario_id;
$_SESSION['nombre'] = $nombre_usuario; // Opcional
header("Location: crear_equipo_spm.php");
exit();

}
?>
