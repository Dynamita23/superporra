document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('formEquipo');
  const totalPuntosSpan = document.getElementById('totalPuntos');
  let totalPuntos = 0;

  form.addEventListener('change', function(e) {
    totalPuntos = 0;

    const selectElements = form.querySelectorAll('select');
    selectElements.forEach(select => {
      const optionText = select.options[select.selectedIndex].text;
      const puntos = optionText.match(/(\\d+) puntos/); // Extraer los puntos del texto
      if (puntos) totalPuntos += parseInt(puntos[1]);
    });

    totalPuntosSpan.textContent = totalPuntos;

    if (totalPuntos > 1400) {
      alert('¡Has excedido el límite de 1400 puntos!');
    }
  });
});
