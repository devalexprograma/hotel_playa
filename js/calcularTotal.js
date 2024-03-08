document.addEventListener('DOMContentLoaded', function() {
  const numPersonas = document.getElementById('numPersonas');
  const numDias = document.getElementById('numDias');
  const totalPagar = document.getElementById('totalPagar');
  const numHabitacion = document.getElementById('numHabitacion');

  // Calcular el total cuando se carga la página por primera vez y al detectar cambios
  calcularTotal();

  numPersonas.addEventListener('input', calcularTotal);
  numDias.addEventListener('input', calcularTotal);
  numHabitacion.addEventListener('change', calcularTotal);

  function calcularTotal() {
    const costoPorPersona = [650, 700, 800, 900];
    const personas = parseInt(numPersonas.value);
    const dias = parseInt(numDias.value);
    const numCamas = parseInt(numHabitacion.options[numHabitacion.selectedIndex].getAttribute('data-camas'));

    if (!isNaN(personas) && !isNaN(dias)) {
      let costo;

      if (personas === 1 && numCamas === 1) {
        costo = costoPorPersona[0];
      } else if (personas === 2 && numCamas === 1) {
        costo = costoPorPersona[1];
      } else if (personas === 1 && numCamas === 2) {
        costo = costoPorPersona[2];
      } else if (personas === 2 && numCamas === 2) {
        costo = costoPorPersona[3];
      } else {
        // Otros casos no contemplados
        costo = 0;
      }

      const total = costo * dias;
      totalPagar.value = '$' + total.toFixed(2);
    } else {
      // Si no hay números válidos, mostrar un valor predeterminado
      totalPagar.value = '';
    }
  }
});
