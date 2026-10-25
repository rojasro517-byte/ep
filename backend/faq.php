<?php
require_once '_layout.php';
require_once 'conexion.php';

abrir_layout('Preguntas frecuentes', 'faq');
?>

<div class="accordion" id="faqAcordeon">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
        ¿Cómo reviso mis notas?
      </button>
    </h2>
    <div id="f1" class="accordion-collapse collapse show" data-bs-parent="#faqAcordeon">
      <div class="accordion-body">
        Entra al apartado <a href="notas.php">Notas</a> desde el menú lateral. Ahí verás el detalle por curso y tu promedio.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
        ¿Dónde veo mi horario de clases?
      </button>
    </h2>
    <div id="f2" class="accordion-collapse collapse" data-bs-parent="#faqAcordeon">
      <div class="accordion-body">
        En el apartado <a href="horario.php">Horario</a> tienes el cronograma semanal completo.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f3">
        ¿Cómo consulto mis pagos?
      </button>
    </h2>
    <div id="f3" class="accordion-collapse collapse" data-bs-parent="#faqAcordeon">
      <div class="accordion-body">
        Ve a <a href="pagos.php">Pagos / Matrícula</a> para ver el historial de tus cuotas y su estado.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f4">
        ¿Dónde descargo mis certificaciones?
      </button>
    </h2>
    <div id="f4" class="accordion-collapse collapse" data-bs-parent="#faqAcordeon">
      <div class="accordion-body">
        En <a href="certificaciones.php">Certificaciones</a> encontrarás todas las que has obtenido.
      </div>
    </div>
  </div>
</div>

<?php cerrar_layout(); ?>
