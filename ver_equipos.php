<?php
include 'head.php';
include 'conexion.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener los equipos registrados por el usuario
$stmt_equipos = $conn->prepare("SELECT id, nombre_equipo FROM equipos_registrados WHERE usuario_id = ?");
$stmt_equipos->bind_param("i", $usuario_id);
$stmt_equipos->execute();
$result_equipos = $stmt_equipos->get_result();
?>

<section id="ver-equipos" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2 style="color: white;">Mis Equipos Registrados</h2>
        </div>

        <!-- Botón Crear Equipo -->
        <div style="display: flex; justify-content: center; margin-bottom: 20px;">
            <a href="crear_equipo.php" class="btn btn-primary" style="padding: 15px 30px; text-align: center; text-decoration: none; color: white;">Crear Equipo</a>
        </div>

        <?php if ($result_equipos->num_rows > 0): ?>
            <table class="table" style="color: white;">
                <thead>
                    <tr>
                        <th style="color: white;">Nombre del Equipo</th>
                        <th style="color: white;">Pilotos Seleccionados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($equipo = $result_equipos->fetch_assoc()): ?>
                        <tr>
                            <td style="color: white;"><?php echo htmlspecialchars($equipo['nombre_equipo']); ?></td>
                            <td style="color: white;">
                                <?php
                                // Obtener pilotos asociados al equipo
                                $equipo_id = $equipo['id'];
                                $stmt_pilotos = $conn->prepare("SELECT piloto_id, categoria FROM equipos_pilotos_registrados WHERE equipo_id = ?");
                                $stmt_pilotos->bind_param("i", $equipo_id);
                                $stmt_pilotos->execute();
                                $result_pilotos = $stmt_pilotos->get_result();

                                $pilotos_f1 = [];
                                $pilotos_motogp = [];

                                while ($piloto = $result_pilotos->fetch_assoc()) {
                                    if ($piloto['categoria'] == 'F1') {
                                        $pilotos_f1[] = $piloto['piloto_id'];
                                    } else {
                                        $pilotos_motogp[] = $piloto['piloto_id'];
                                    }
                                }

                                // Mostrar nombres de pilotos de F1 y MotoGP
                                echo "<strong>F1:</strong> " . implode(", ", $pilotos_f1) . "<br>";
                                echo "<strong>MotoGP:</strong> " . implode(", ", $pilotos_motogp);

                                $stmt_pilotos->close();
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: white;">No tienes equipos registrados.</p>
        <?php endif; ?>

        <?php $stmt_equipos->close(); ?>
    </div>
</section>

<?php include 'footer.php'; ?>


<?php include 'footer.php'; ?>

