<?php
include 'head.php'; 
include 'conexion.php'; 
session_start();

$mensaje = "";

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    echo "Por favor, inicia sesión para acceder a esta página.";
    exit();
}

// Verificar rol de usuario, si está disponible en la sesión
if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] !== 'admin') {
    echo "No tienes permisos para acceder a esta página.";
    exit();
}

// Si se envía el formulario, generar el código y guardarlo en la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidad_codigos = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 1;

    // Generar y guardar cada código
    for ($i = 0; $i < $cantidad_codigos; $i++) {
        $codigo_verificacion = bin2hex(random_bytes(5)); // Genera un código único de 10 caracteres

        // Insertar el código en la tabla 'codigos'
        $stmt = $conn->prepare("INSERT INTO codigos (codigo) VALUES (?)");
        $stmt->bind_param("s", $codigo_verificacion);

        if ($stmt->execute()) {
            $mensaje .= "Código generado: $codigo_verificacion <br>";
        } else {
            $mensaje .= "Error al generar el código. <br>";
        }
    }
}
?>

<section id="crear-codigo" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Generar Códigos de Verificación</h2>
            <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

            <form action="crear_codigo.php" method="POST">
                <label for="cantidad">Cantidad de Códigos a Generar:</label>
                <input type="number" id="cantidad" name="cantidad" value="1" min="1" required>

                <input type="submit" value="Generar Códigos">
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

