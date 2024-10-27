<?php
include 'conexion.php';

// Consulta para obtener los nombres de pilotos de F1 y MotoGP
$query_f1 = "SELECT nombre FROM puntos_pilotos_f1";
$query_motogp = "SELECT nombre FROM puntos_pilotos_motogp";
$result_f1 = $conn->query($query_f1);
$result_motogp = $conn->query($query_motogp);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Valores de Pilotos</title>
</head>
<body>
    <h2>Introduce el valor para cada piloto</h2>
    <form action="actualizar_valores.php" method="POST">
        <h3>Pilotos F1</h3>
        <?php while ($row = $result_f1->fetch_assoc()): ?>
            <label for="f1_<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?>:</label>
            <input type="number" name="f1_valores[<?php echo $row['nombre']; ?>]" required>
            <br>
        <?php endwhile; ?>

        <h3>Pilotos MotoGP</h3>
        <?php while ($row = $result_motogp->fetch_assoc()): ?>
            <label for="motogp_<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?>:</label>
            <input type="number" name="motogp_valores[<?php echo $row['nombre']; ?>]" required>
            <br>
        <?php endwhile; ?>

        <input type="submit" value="Actualizar Valores">
    </form>
</body>
</html>
