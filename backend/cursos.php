<?php
require_once '_layout.php';
require_once 'conexion.php';

abrir_layout('Mis cursos', 'cursos');
?>

<div class="row">
  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-primary h-100">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-code-slash me-1"></i> Programación Orientada a Objetos</h3>
      </div>
      <div class="card-body">
        <p><strong>Docente:</strong> Ing. Carlos Ramírez</p>
        <p><strong>Ciclo:</strong> IV</p>
        <p><strong>Créditos:</strong> 4</p>
        <p class="mb-0"><strong>Modalidad:</strong> Presencial</p>
      </div>
      <div class="card-footer">
        <span class="badge text-bg-success">Aprobado</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-success h-100">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-database me-1"></i> Base de Datos</h3>
      </div>
      <div class="card-body">
        <p><strong>Docente:</strong> Ing. María Torres</p>
        <p><strong>Ciclo:</strong> IV</p>
        <p><strong>Créditos:</strong> 4</p>
        <p class="mb-0"><strong>Modalidad:</strong> Presencial</p>
      </div>
      <div class="card-footer">
        <span class="badge text-bg-success">Aprobado</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-warning h-100">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-bar-chart me-1"></i> Análisis de Datos</h3>
      </div>
      <div class="card-body">
        <p><strong>Docente:</strong> Ing. Luis Fernández</p>
        <p><strong>Ciclo:</strong> IV</p>
        <p><strong>Créditos:</strong> 3</p>
        <p class="mb-0"><strong>Modalidad:</strong> Virtual</p>
      </div>
      <div class="card-footer">
        <span class="badge text-bg-success">Aprobado</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-info h-100">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-lightning-charge me-1"></i> Automatización con Power Platform</h3>
      </div>
      <div class="card-body">
        <p><strong>Docente:</strong> Ing. Ana Gutiérrez</p>
        <p><strong>Ciclo:</strong> IV</p>
        <p><strong>Créditos:</strong> 3</p>
        <p class="mb-0"><strong>Modalidad:</strong> Virtual</p>
      </div>
      <div class="card-footer">
        <span class="badge text-bg-success">Aprobado</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-danger h-100">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-diagram-3 me-1"></i> Ingeniería de Sistemas IV</h3>
      </div>
      <div class="card-body">
        <p><strong>Docente:</strong> Ing. Pedro Salazar</p>
        <p><strong>Ciclo:</strong> IV</p>
        <p><strong>Créditos:</strong> 4</p>
        <p class="mb-0"><strong>Modalidad:</strong> Presencial</p>
      </div>
      <div class="card-footer">
        <span class="badge text-bg-warning">En curso</span>
      </div>
    </div>
  </div>
</div>

<?php cerrar_layout(); ?>
