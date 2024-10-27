<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Contacto</h2>
      <p>Puedes contactar con nosotros por cualquier vía disponible.</p>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Posadas</h3>
              <p>CO 14730</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>info@superporra.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4">
              <a href="https://www.facebook.com/superporramalena" class="facebook"><i class="bx bxl-facebook"></i></a>
              <h3>Facebook</h3>
              <p><br>Superporra 2025</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-4 mt-md-0">
        <!-- Formulario con AJAX -->
        <form id="contact-form" method="POST">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Titulo" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div id="form-response" style="display: none;" class="sent-message">Tu mensaje ha sido enviado. ¡Gracias!</div>
          </div>
          <div class="text-center"><button type="submit">Enviar</button></div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Section -->

<!-- AJAX para enviar el formulario sin recargar la página -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault(); // Prevenir el envío tradicional del formulario
        $.ajax({
            url: "https://formspree.io/f/xldeezan", // Reemplaza con tu URL de Formspree
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function() {
                $('#form-response').show(); // Mostrar el mensaje de éxito
                $('#contact-form')[0].reset(); // Limpiar el formulario
            },
            error: function() {
                $('#form-response').text("Ocurrió un error. Inténtalo de nuevo.").show();
            }
        });
    });
});
</script>

