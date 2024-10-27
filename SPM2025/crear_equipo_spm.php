<?php
// Validación exitosa del login
session_start();
$_SESSION['usuario_id'] = $usuario_id;
$_SESSION['nombre'] = $nombre_usuario; // Opcional


include 'conexion.php'; // Asegúrate de tener una conexión válida a la base de datos

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    echo "Por favor, inicia sesión para registrar un equipo.";
    exit;
}

// Obtener los pilotos y sus puntos de F1 y MotoGP
$queryF1 = "SELECT id, nombre, equipo, puntos FROM pilotos_f1";
$queryMotoGP = "SELECT id, nombre, equipo, puntos FROM pilotos_motogp";

$resultF1 = $conn->query($queryF1);
$resultMotoGP = $conn->query($queryMotoGP);

if (!$resultF1 || !$resultMotoGP) {
    echo "Error al obtener los pilotos: " . $conn->error;
    exit;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_equipo = $_POST['nombre_equipo'];
    $pilotos_f1 = $_POST['pilotos_f1'];
    $pilotos_motogp = $_POST['pilotos_motogp'];

    // Calcular el total de puntos
    $total_puntos = 0;
    foreach ($pilotos_f1 as $id) {
        $query = "SELECT puntos FROM pilotos_f1 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($puntos);
        $stmt->fetch();
        $total_puntos += $puntos;
        $stmt->close();
    }

    foreach ($pilotos_motogp as $id) {
        $query = "SELECT puntos FROM pilotos_motogp WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($puntos);
        $stmt->fetch();
        $total_puntos += $puntos;
        $stmt->close();
    }

    if ($total_puntos > 1400) {
        $mensaje = "La selección excede los 1400 puntos permitidos.";
    } else {
        // Insertar el equipo en equipos_registrados
        $usuario_id = $_SESSION['usuario_id'];
        $codigo_verificacion = uniqid(); // Generar un código de verificación único
        $fecha_creacion = date("Y-m-d");

        $stmt = $conn->prepare("INSERT INTO equipos_registrados (nombre_equipo, usuario_id, codigo_verificacion, fecha_creacion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $nombre_equipo, $usuario_id, $codigo_verificacion, $fecha_creacion);
        $stmt->execute();
        $equipo_id = $stmt->insert_id; // Obtener el ID del equipo registrado
        $stmt->close();

        // Insertar pilotos en equipos_pilotos_registrados
        foreach ($pilotos_f1 as $id) {
            $categoria = 'F1';
            $stmt = $conn->prepare("INSERT INTO equipos_pilotos_registrados (equipo_id, piloto_id, categoria) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $equipo_id, $id, $categoria);
            $stmt->execute();
            $stmt->close();
        }

        foreach ($pilotos_motogp as $id) {
            $categoria = 'MotoGP';
            $stmt = $conn->prepare("INSERT INTO equipos_pilotos_registrados (equipo_id, piloto_id, categoria) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $equipo_id, $id, $categoria);
            $stmt->execute();
            $stmt->close();
        }

        $mensaje = "Equipo registrado correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Equipo</title>
</head>
<body>
    <h2>Registro de Equipo</h2>
    <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

    <form action="crear_equipo_spm.php" method="POST">
        <label for="nombre_equipo">Nombre del Equipo:</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" required>

        <h3>Seleccionar Pilotos de F1</h3>
        <?php while ($row = $resultF1->fetch_assoc()): ?>
            <input type="checkbox" name="pilotos_f1[]" value="<?php echo $row['id']; ?>">
            <?php echo $row['nombre'] . " - Puntos: " . $row['puntos']; ?><br>
        <?php endwhile; ?>

        <h3>Seleccionar Pilotos de MotoGP</h3>
        <?php while ($row = $resultMotoGP->fetch_assoc()): ?>
            <input type="checkbox" name="pilotos_motogp[]" value="<?php echo $row['id']; ?>">
            <?php echo $row['nombre'] . " - Puntos: " . $row['puntos']; ?><br>
        <?php endwhile; ?>

        <input type="submit" value="Registrar Equipo">
    </form>
</body>
</html>


