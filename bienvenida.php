<?php
include 'head.php'; 
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<body>
    <section id="bienvenida" class="contact section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1>Bienvenido!</h1>
                <p>¿Qué te gustaría hacer?</p>
            </div>
            <div class="button-group" style="display: flex; justify-content: center; gap: 20px;">
                <a href="crear_equipo.php" class="btn btn-primary" style="padding: 15px 30px; text-align: center; text-decoration: none;">Crear Equipo</a>
                <a href="ver_equipos.php" class="btn btn-primary" style="padding: 15px 30px; text-align: center; text-decoration: none;">Ver Equipos Registrados</a>
            </div>
        </div>
    </section>
</body>
</html>

<?php include 'footer.php'; ?>
