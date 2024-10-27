<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si tienes una contraseña
$dbname = "spm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener carreras de MotoGP y Fórmula 1
$carreras_motogp = $conn->query("SELECT id, nombre_carrera FROM carreras_motogp");
$carreras_f1 = $conn->query("SELECT id, nombre_carrera FROM carreras_f1");
$pilotos = $conn->query("SELECT id, nombre FROM pilotos_motogp"); // Puedes añadir también pilotos de F1 si lo deseas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Resultados</title>
</head>
<body>
    <h1>Ingreso de Resultados de Carreras</h1>
    <form action="insertar_resultados.php" method="POST">
        <label for="carrera">Seleccionar Carrera MotoGP:</label>
        <select name="carrera_id" id="carrera" required>
            <option value="">Seleccione una carrera de MotoGP</option>
            <?php while ($row = $carreras_motogp->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_carrera']; ?></option>
            <?php endwhile; ?>
        </select>

        <br>

        <label for="carrera_f1">Seleccionar Carrera Fórmula 1:</label>
        <select name="carrera_id_f1" id="carrera_f1" required>
            <option value="">Seleccione una carrera de Fórmula 1</option>
            <?php while ($row = $carreras_f1->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_carrera']; ?></option>
            <?php endwhile; ?>
        </select>

        <br>

        <label for="piloto">Seleccionar Piloto:</label>
        <select name="piloto_id" id="piloto" required>
            <option value="">Seleccione un piloto</option>
            <?php while ($row = $pilotos->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php endwhile; ?>
        </select>

        <br>

        <label for="posicion">Posición:</label>
        <input type="number" name="posicion" id="posicion" required>

        <br>

        <label for="puntos">Puntos:</label>
        <input type="number" name="puntos" id="puntos" required>

        <br>

        <input type="submit" value="Ingresar Resultados">
    </form>
</body>
</html>

<?php
$conn->close();
?>

