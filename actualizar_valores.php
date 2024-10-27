<?php
include 'conexion.php';

// Actualizar los valores para los pilotos de F1
if (isset($_POST['f1_valores'])) {
    foreach ($_POST['f1_valores'] as $nombre => $valor) {
        $update_f1 = "UPDATE puntos_pilotos_f1 SET valor = ? WHERE nombre = ?";
        $stmt_f1 = $conn->prepare($update_f1);
        $stmt_f1->bind_param("is", $valor, $nombre);
        $stmt_f1->execute();
    }
}

// Actualizar los valores para los pilotos de MotoGP
if (isset($_POST['motogp_valores'])) {
    foreach ($_POST['motogp_valores'] as $nombre => $valor) {
        $update_motogp = "UPDATE puntos_pilotos_motogp SET valor = ? WHERE nombre = ?";
        $stmt_motogp = $conn->prepare($update_motogp);
        $stmt_motogp->bind_param("is", $valor, $nombre);
        $stmt_motogp->execute();
    }
}

echo "Valores actualizados correctamente.";
?>
