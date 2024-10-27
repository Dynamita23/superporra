<?php
// Configuración de conexión a PostgreSQL
$host = "dpg-csf7tk68ii6s739d1s7g-a";
$port = "5432";
$user = "admin";
$password = "FS7scmogwDj2AFXYottKgsZcB9gAxkjK";
$database = "spm";

// Crear la cadena de conexión
$conn_string = "host=$host port=$port dbname=$database user=$user password=$password";

// Conectar a PostgreSQL
$conn = pg_connect($conn_string);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . pg_last_error());
} else {
    echo "Conexión exitosa a PostgreSQL!";
}
?>

