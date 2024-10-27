
<?php include 'head.php'; ?>
<?php include 'conexion.php'; session_start(); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hash);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hash)) {
        $_SESSION['usuario_id'] = $id;
        header("Location: bienvenida.php");
        exit();
    } else {
        $error = "Credenciales incorrectas";
    }

    $stmt->close();
}
?>

<section id="login-usuario"class="contact section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="login.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Iniciar Sesión">
    </form>
</section>
<?php include 'footer.php'; ?>
