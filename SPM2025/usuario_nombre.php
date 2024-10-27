<?php include 'head.php'; ?>
<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: usuario.php");
    exit();
}
?>


<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>
    <p>¡Has iniciado sesión con éxito!</p>
</body>
</html>
<?php include 'footer.php'; ?>