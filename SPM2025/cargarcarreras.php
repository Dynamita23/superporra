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

// Cargar carreras de MotoGP
$url_motogp = "https://www.motogp.com/en/calendar";
$html_motogp = file_get_contents($url_motogp);
$soup_motogp = new DOMDocument();
@$soup_motogp->loadHTML($html_motogp);
$xpath_motogp = new DOMXPath($soup_motogp);
$carreras_motogp = $xpath_motogp->query("//div[contains(@class, 'calendar__race')]");

foreach ($carreras_motogp as $carrera) {
    $nombre_carrera = $xpath_motogp->query(".//div[contains(@class, 'calendar__race-name')]", $carrera)->item(0)->nodeValue;
    $fecha = $xpath_motogp->query(".//div[contains(@class, 'calendar__date')]", $carrera)->item(0)->nodeValue;  // Ajustar si es necesario
    $pais = $xpath_motogp->query(".//div[contains(@class, 'calendar__race-country')]", $carrera)->item(0)->nodeValue;
    $circuito = $xpath_motogp->query(".//div[contains(@class, 'calendar__race-track')]", $carrera)->item(0)->nodeValue;

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO carreras_motogp (nombre_carrera, fecha, pais, circuito) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre_carrera, $fecha, $pais, $circuito);
    $stmt->execute();
}

// Cargar carreras de Fórmula 1
$url_f1 = "https://www.formula1.com/en/racing/2024.html";
$html_f1 = file_get_contents($url_f1);
$soup_f1 = new DOMDocument();
@$soup_f1->loadHTML($html_f1);
$xpath_f1 = new DOMXPath($soup_f1);
$carreras_f1 = $xpath_f1->query("//div[contains(@class, 'race-card')]");

foreach ($carreras_f1 as $carrera) {
    $nombre_carrera = $xpath_f1->query(".//div[contains(@class, 'race-name')]", $carrera)->item(0)->nodeValue;
    $fecha = $xpath_f1->query(".//div[contains(@class, 'race-date')]", $carrera)->item(0)->nodeValue;  // Ajustar si es necesario
    $pais = $xpath_f1->query(".//div[contains(@class, 'race-location')]", $carrera)->item(0)->nodeValue;
    $circuito = $xpath_f1->query(".//div[contains(@class, 'race-track')]", $carrera)->item(0)->nodeValue;

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO carreras_f1 (nombre_carrera, fecha, pais, circuito) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre_carrera, $fecha, $pais, $circuito);
    $stmt->execute();
}

// Cerrar la conexión
$stmt->close();
$conn->close();

echo "Carreras de MotoGP y Fórmula 1 cargadas en la base de datos.";
?>
