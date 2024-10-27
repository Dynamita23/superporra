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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_equipo = $_POST['nombre_equipo'];
    $usuario_id = $_SESSION['usuario_id'];
    $codigo_verificacion = $_POST['codigo_verificacion'];
    $fecha_creacion = date("Y-m-d");

    // Verificar si el nombre del equipo ya existe
    $stmt_nombre_equipo = $conn->prepare("SELECT nombre_equipo FROM equipos_registrados WHERE nombre_equipo = ?");
    $stmt_nombre_equipo->bind_param("s", $nombre_equipo);
    $stmt_nombre_equipo->execute();
    $result_nombre = $stmt_nombre_equipo->get_result();

    if ($result_nombre->num_rows > 0) {
        $mensaje = "El nombre del equipo ya existe. Por favor, elija un nombre diferente.";
    } elseif (count($pilotos_f1_seleccionados) != 7) {
        $mensaje = "Debe seleccionar exactamente 7 pilotos de F1.";
    } elseif (count($pilotos_motogp_seleccionados) != 7) {
        $mensaje = "Debe seleccionar exactamente 7 pilotos de MotoGP.";
    } else {
        // Verificar combinación única de pilotos F1
        $stmt_f1_comb = $conn->prepare("SELECT equipo_id FROM equipos_pilotos_registrados WHERE categoria = 'F1' AND piloto_id IN (" . str_repeat('?,', count($pilotos_f1_seleccionados) - 1) . "?) GROUP BY equipo_id HAVING COUNT(DISTINCT piloto_id) = 7");
        $stmt_f1_comb->bind_param(str_repeat("s", count($pilotos_f1_seleccionados)), ...$pilotos_f1_seleccionados);
        $stmt_f1_comb->execute();
        $result_f1_comb = $stmt_f1_comb->get_result();

        // Verificar combinación única de pilotos MotoGP
        $stmt_motogp_comb = $conn->prepare("SELECT equipo_id FROM equipos_pilotos_registrados WHERE categoria = 'MotoGP' AND piloto_id IN (" . str_repeat('?,', count($pilotos_motogp_seleccionados) - 1) . "?) GROUP BY equipo_id HAVING COUNT(DISTINCT piloto_id) = 7");
        $stmt_motogp_comb->bind_param(str_repeat("s", count($pilotos_motogp_seleccionados)), ...$pilotos_motogp_seleccionados);
        $stmt_motogp_comb->execute();
        $result_motogp_comb = $stmt_motogp_comb->get_result();

        if ($result_f1_comb->num_rows > 0 && $result_motogp_comb->num_rows > 0) {
            $mensaje = "La combinación de pilotos seleccionada ya está registrada en otro equipo. Por favor, elige otra combinación.";
        } else {
            // Verificar si el código de verificación existe en la tabla `codigos`
            $stmt_codigo = $conn->prepare("SELECT codigo FROM codigos WHERE codigo = ?");
            $stmt_codigo->bind_param("s", $codigo_verificacion);
            $stmt_codigo->execute();
            $result_codigo = $stmt_codigo->get_result();

            if ($result_codigo->num_rows > 0) {
                // Calcular el total de puntos para pilotos de F1
                $total_puntos_f1 = 0;
                $stmt_puntos_f1 = $conn->prepare("SELECT SUM(valor) AS total FROM puntos_pilotos_f1 WHERE nombre IN (" . str_repeat('?,', count($pilotos_f1_seleccionados) - 1) . "?)");
                $stmt_puntos_f1->bind_param(str_repeat("s", count($pilotos_f1_seleccionados)), ...$pilotos_f1_seleccionados);
                $stmt_puntos_f1->execute();
                $result_f1 = $stmt_puntos_f1->get_result()->fetch_assoc();
                $total_puntos_f1 = $result_f1['total'] ?? 0;
                $stmt_puntos_f1->close();

                // Calcular el total de puntos para pilotos de MotoGP
                $total_puntos_motogp = 0;
                $stmt_puntos_motogp = $conn->prepare("SELECT SUM(valor) AS total FROM puntos_pilotos_motogp WHERE nombre IN (" . str_repeat('?,', count($pilotos_motogp_seleccionados) - 1) . "?)");
                $stmt_puntos_motogp->bind_param(str_repeat("s", count($pilotos_motogp_seleccionados)), ...$pilotos_motogp_seleccionados);
                $stmt_puntos_motogp->execute();
                $result_motogp = $stmt_puntos_motogp->get_result()->fetch_assoc();
                $total_puntos_motogp = $result_motogp['total'] ?? 0;
                $stmt_puntos_motogp->close();

                // Validación de puntos máximos
                if ($total_puntos_f1 > 1400) {
                    $mensaje = "El total de puntos en F1 supera los 1400 puntos. Ajuste su selección.";
                } elseif ($total_puntos_motogp > 1400) {
                    $mensaje = "El total de puntos en MotoGP supera los 1400 puntos. Ajuste su selección.";
                } else {
                    // Insertar el equipo en la tabla equipos_registrados
                    $stmt = $conn->prepare("INSERT INTO equipos_registrados (nombre_equipo, usuario_id, codigo_verificacion, fecha_creacion) VALUES (?, ?, ?, ?)");
                    
                    if ($stmt) {
                        $stmt->bind_param("siss", $nombre_equipo, $usuario_id, $codigo_verificacion, $fecha_creacion);

                        if ($stmt->execute()) {
                            $equipo_id = $stmt->insert_id;
                            $pilotos_seleccionados = array_merge($pilotos_f1_seleccionados, $pilotos_motogp_seleccionados);

                            // Insertar pilotos
                            foreach ($pilotos_seleccionados as $piloto_nombre) {
                                $categoria = in_array($piloto_nombre, $pilotos_f1_seleccionados) ? "F1" : "MotoGP";
                                $stmt_piloto = $conn->prepare("INSERT INTO equipos_pilotos_registrados (equipo_id, piloto_id, categoria) VALUES (?, ?, ?)");

                                if ($stmt_piloto) {
                                    $stmt_piloto->bind_param("iss", $equipo_id, $piloto_nombre, $categoria);
                                    $stmt_piloto->execute();
                                } else {
                                    $mensaje = "Error al preparar la consulta de pilotos: " . $conn->error;
                                    break;
                                }
                            }
                            $mensaje = "Equipo registrado correctamente.";
                            // Limpiar valores si el registro fue exitoso
                            $nombre_equipo = $codigo_verificacion = '';
                            $pilotos_f1_seleccionados = $pilotos_motogp_seleccionados = [];
                        } else {
                            $mensaje = "Error al registrar el equipo: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        $mensaje = "Error en la consulta de registro de equipo: " . $conn->error;
                    }
                }
            } else {
                $mensaje = "El código de verificación no es válido.";
            }

            $stmt_codigo->close();
        }

        $stmt_f1_comb->close();
        $stmt_motogp_comb->close();
    }

    $stmt_nombre_equipo->close();
}
?>

<section id="crear-equipo" class="contact section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
    <h2>Registro de Equipo</h2>
    <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>
    <form action="crear_equipo.php" method="POST">
        <label for="nombre_equipo">Nombre del Equipo:</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" required value="<?php echo htmlspecialchars($nombre_equipo); ?>">

        <label for="codigo_verificacion">Código de Verificación:</label>
        <input type="text" id="codigo_verificacion" name="codigo_verificacion" required value="<?php echo htmlspecialchars($codigo_verificacion); ?>">

        <h3>Seleccionar Pilotos de F1</h3>
        <?php
        $result_f1 = $conn->query("SELECT nombre, valor FROM puntos_pilotos_f1");
        if (!$result_f1) {
            echo "<p>Error en la consulta de pilotos F1: " . $conn->error . "</p>";
        } elseif ($result_f1->num_rows > 0) {
            while ($row = $result_f1->fetch_assoc()) {
                $checked = in_array($row['nombre'], $pilotos_f1_seleccionados) ? 'checked' : '';
                echo "<input type='checkbox' name='pilotos_f1[]' value='{$row['nombre']}' $checked> {$row['nombre']} ({$row['valor']} puntos)<br>";
            }
        } else {
            echo "<p>No hay pilotos de F1 disponibles o hubo un error en la consulta.</p>";
        }
        ?>

        <h3>Seleccionar Pilotos de MotoGP</h3>
        <?php
        $result_motogp = $conn->query("SELECT nombre, valor FROM puntos_pilotos_motogp");
        if (!$result_motogp) {
            echo "<p>Error en la consulta de pilotos MotoGP: " . $conn->error . "</p>";
        } elseif ($result_motogp->num_rows > 0) {
            while ($row = $result_motogp->fetch_assoc()) {
                $checked = in_array($row['nombre'], $pilotos_motogp_seleccionados) ? 'checked' : '';
                echo "<input type='checkbox' name='pilotos_motogp[]' value='{$row['nombre']}' $checked> {$row['nombre']} ({$row['valor']} puntos)<br>";
            }
        } else {
            echo "<p>No hay pilotos de MotoGP disponibles o hubo un error en la consulta.</p>";
        }
        ?>

        <input type="submit" value="Registrar Equipo">
    </form>
</section>

<?php include 'footer.php'; ?>

