<?php
require_once '_layout.php';
require_once 'conexion.php';

abrir_layout('Mensajes', 'mensajes');
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><i class="bi bi-inbox me-1"></i> Bandeja de entrada</h3>
  </div>
  <div class="card-body p-0">
    <div class="list-group list-group-flush">
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="mb-1"><i class="bi bi-person-circle me-1"></i> Coordinación Académica</h6>
          <small class="text-muted">Hoy</small>
        </div>
        <p class="mb-1">Recordatorio: las matrículas para el próximo ciclo están abiertas.</p>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="mb-1"><i class="bi bi-person-circle me-1"></i> Ing. María Torres</h6>
          <small class="text-muted">Ayer</small>
        </div>
        <p class="mb-1">Se publicaron las notas del segundo examen de Base de Datos.</p>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="mb-1"><i class="bi bi-person-circle me-1"></i> Secretaría General</h6>
          <small class="text-muted">Hace 3 días</small>
        </div>
        <p class="mb-1">Tu certificado de Power Apps está listo para descargar.</p>
      </a>
    </div>
  </div>
</div>

<?php cerrar_layout(); ?>
