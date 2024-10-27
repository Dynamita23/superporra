<?php
$conn = new mysqli("localhost", "root", "", "spm");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
