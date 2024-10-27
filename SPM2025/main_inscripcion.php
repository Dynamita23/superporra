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