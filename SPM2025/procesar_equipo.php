<body>

  <h1>Crear tu Equipo para la Temporada 2025</h1>
  <form action="procesar_equipo.php" method="POST" id="formEquipo">
    <h3>Selecciona 7 Pilotos de MotoGP</h3>
    <div class="pilotos-motogp">
      <?php
      $conn = new mysqli("localhost", "root", "", "superporra_db");
      if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM pilotos_motogp";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<select name="motogp[]" required>';
              echo '<option value="'.$row['id'].'" data-puntos="'.$row['puntos'].'">'.$row['nombre'].' - '.$row['puntos'].' puntos</option>';
              echo '</select>';
          }
      } else {
          echo "No hay pilotos disponibles.";
      }
      $conn->close();
      ?>
      <!-- Repetir para cada uno de los 7 pilotos de MotoGP -->
    </div>

    <h3>Selecciona 7 Pilotos de Fórmula 1</h3>
    <div class="pilotos-f1">
      <?php
      $conn = new mysqli("localhost", "root", "", "superporra_db");
      if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM pilotos_f1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<select name="f1[]" required>';
              echo '<option value="'.$row['id'].'" data-puntos="'.$row['puntos'].'">'.$row['nombre'].' - '.$row['puntos'].' puntos</option>';
              echo '</select>';
          }
      } else {
          echo "No hay pilotos disponibles.";
      }
      $conn->close();
      ?>
      <!-- Repetir para cada uno de los 7 pilotos de F1 -->
    </div>

    <div class="total-puntos">
      <p>Total de Puntos Usados: <span id="totalPuntos">0</span></p>
    </div>

    <button type="submit">Crear Equipo</button>
  </form>

  <script src="script.js"></script>
</body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "superporra_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$motogp_pilotos = $_POST['motogp'];
$f1_pilotos = $_POST['f1'];

// Verificar que se seleccionaron 7 pilotos
if (count($motogp_pilotos) !== 7 || count($f1_pilotos) !== 7) {
    die("Debes seleccionar 7 pilotos de cada categoría.");
}

// Insertar el equipo en la base de datos
$sql = "INSERT INTO equipos (motogp1, motogp2, motogp3, motogp4, motogp5, motogp6, motogp7, f1_1, f1_2, f1_3, f1_4, f1_5, f1_6, f1_7)
        VALUES ('$motogp_pilotos[0]', '$motogp_pilotos[1]', '$motogp_pilotos[2]', '$motogp_pilotos[3]', '$motogp_pilotos[4]', '$motogp_pilotos[5]', '$motogp_pilotos[6]',
                '$f1_pilotos[0]', '$f1_pilotos[1]', '$f1_pilotos[2]', '$f1_pilotos[3]', '$f1_pilotos[4]', '$f1_pilotos[5]', '$f1_pilotos[6]')";

if ($conn->query($sql) === TRUE) {
    echo "Equipo creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
