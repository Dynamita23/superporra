<?php 
include 'head.php'; 
include 'conexion.php'; 
session_start(); 

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$mensaje = "";
$nombre_equipo = $_POST['nombre_equipo'] ?? '';
$codigo_verificacion = $_POST['codigo_verificacion'] ?? '';
$pilotos_f1_seleccionados = $_POST['pilotos_f1'] ?? [];
$pilotos_motogp_seleccionados = $_POST['pilotos_motogp'] ?? [];

// Lógica de registro de equipo (sin cambios)
// ...

?>

<section id="crear-equipo" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Registro de Equipo</h2>
            <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>
        </div>

        <!-- Botón "Ver Equipos" -->
        <div style="display: flex; justify-content: center; margin-bottom: 20px;">
            <a href="ver_equipos.php" class="btn btn-primary" style="padding: 15px 30px; text-align: center; text-decoration: none; color: white;">Ver Equipos</a>
        </div>

        <form action="crear_equipo.php" method="POST">
            <label for="nombre_equipo">Nombre del Equipo:</label>
            <input type="text" id="nombre_equipo" name="nombre_equipo" required value="<?php echo htmlspecialchars($nombre_equipo); ?>">

            <label for="codigo_verificacion">Código de Verificación:</label>
            <input type="text" id="codigo_verificacion" name="codigo_verificacion" required value="<?php echo htmlspecialchars($codigo_verificacion); ?>">

            <h3>Seleccionar Pilotos de F1</h3>
            <?php
            $result_f1 = $conn->query("SELECT nombre, valor FROM puntos_pilotos_f1");
            if (!$result_f1) {
                echo "<p style='color: white;'>Error en la consulta de pilotos F1: " . $conn->error . "</p>";
            } elseif ($result_f1->num_rows > 0) {
                while ($row = $result_f1->fetch_assoc()) {
                    $checked = in_array($row['nombre'], $pilotos_f1_seleccionados) ? 'checked' : '';
                    echo "<input type='checkbox' name='pilotos_f1[]' value='{$row['nombre']}' $checked> {$row['nombre']} ({$row['valor']} puntos)<br>";
                }
            } else {
                echo "<p style='color: white;'>No hay pilotos de F1 disponibles o hubo un error en la consulta.</p>";
            }
            ?>

            <h3>Seleccionar Pilotos de MotoGP</h3>
            <?php
            $result_motogp = $conn->query("SELECT nombre, valor FROM puntos_pilotos_motogp");
            if (!$result_motogp) {
                echo "<p style='color: white;'>Error en la consulta de pilotos MotoGP: " . $conn->error . "</p>";
            } elseif ($result_motogp->num_rows > 0) {
                while ($row = $result_motogp->fetch_assoc()) {
                    $checked = in_array($row['nombre'], $pilotos_motogp_seleccionados) ? 'checked' : '';
                    echo "<input type='checkbox' name='pilotos_motogp[]' value='{$row['nombre']}' $checked> {$row['nombre']} ({$row['valor']} puntos)<br>";
                }
            } else {
                echo "<p style='color: white;'>No hay pilotos de MotoGP disponibles o hubo un error en la consulta.</p>";
            }
            ?>

            <input type="submit" value="Registrar Equipo">
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>





























