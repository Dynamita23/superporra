<?php
session_start();

?>

<section id="registro-usuario" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Registro de Usuario</h2>
            <form action="registro_usuario.php" method="POST">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Registrar">
            </form>

            <?php
            if (isset($_SESSION['mensaje'])) {
                echo "<div class='mensaje-confirmacion'>" . $_SESSION['mensaje'] . "</div>";
                unset($_SESSION['mensaje']);
                
            }
            ?>
        </div>
    </div>
</section>

<section id="login-usuario" class="login section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Inicio de Sesión</h2>
        </div>
        <form action="login_usuario.php" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Iniciar Sesión">
        </form>
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</section>




<?php include 'footer.php'; ?>
