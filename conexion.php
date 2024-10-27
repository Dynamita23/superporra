<?php
$host = "localhost"; // Cambia según tu configuración
$user = "root";
$password = "";
$database = "spm";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

