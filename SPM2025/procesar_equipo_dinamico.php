
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "superporra_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$motogp_pilotos = $_POST['motogp'];
$f1_pilotos = $_POST['f1'];

// Verificar que se seleccionaron 7 pilotos
if (count($motogp_pilotos) !== 7 || count($f1_pilotos) !== 7) {
    die("Debes seleccionar 7 pilotos de cada categoría.");
}

// Insertar el equipo en la base de datos
$sql = "INSERT INTO equipos (motogp1, motogp2, motogp3, motogp4, motogp5, motogp6, motogp7, f1_1, f1_2, f1_3, f1_4, f1_5, f1_6, f1_7)
        VALUES ('$motogp_pilotos[0]', '$motogp_pilotos[1]', '$motogp_pilotos[2]', '$motogp_pilotos[3]', '$motogp_pilotos[4]', '$motogp_pilotos[5]', '$motogp_pilotos[6]',
                '$f1_pilotos[0]', '$f1_pilotos[1]', '$f1_pilotos[2]', '$f1_pilotos[3]', '$f1_pilotos[4]', '$f1_pilotos[5]', '$f1_pilotos[6]')";

if ($conn->query($sql) === TRUE) {
    echo "Equipo creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
