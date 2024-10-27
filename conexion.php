<?php
$host = "postgresql://admin:FS7scmogwDj2AFXYottKgsZcB9gAxkjK@dpg-csf7tk68ii6s739d1s7g-a/spm"; // Cambia según tu configuración
$user = "admin";
$password = "FS7scmogwDj2AFXYottKgsZcB9gAxkjK";
$database = "spm";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

