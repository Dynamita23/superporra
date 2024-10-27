<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si tienes una contraseña
$dbname = "superporra_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$carrera_id = $_POST['carrera_id']; // Para MotoGP
$carrera_id_f1 = $_POST['carrera_id_f1']; // Para Fórmula 1
$piloto_id = $_POST['piloto_id'];
$posicion = $_POST['posicion'];
$puntos = $_POST['puntos'];

// Insertar el resultado en la tabla de resultados de MotoGP o Fórmula 1 según corresponda
if (!empty($carrera_id)) {
    $sql = "INSERT INTO resultados_motogp (carrera_id, piloto_id, posicion, puntos) VALUES
