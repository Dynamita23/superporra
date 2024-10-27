<?php include 'head.php'; ?>
<?php include 'conexion.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        $mensaje = "Usuario registrado correctamente";
    } else {
        $mensaje = "Error al registrar el usuario: " . $stmt->error;
    }

    $stmt->close();
}
?>

<section id="registro-usuario" class="contact section-bg">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
    <h2>Registro de Usuario</h2>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
    <form action="crear_usuario.php" method="POST">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Registrar">
    </form>
</div>
</div>
</section>
<?php include 'footer.php'; ?>