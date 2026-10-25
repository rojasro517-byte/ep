<?php
require_once '_layout.php';
require_once 'conexion.php';

abrir_layout('Certificaciones', 'certificaciones');
?>

<div class="row">
  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-primary h-100">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-lightning-charge me-1"></i> Power Apps y Power Automate</h5>
        <p class="text-muted mb-2">IDAT — marzo 2026 · 32 horas académicas.</p>
        <span class="badge text-bg-primary">Power Apps</span>
        <span class="badge text-bg-primary">Power Automate</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-success h-100">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-file-earmark-spreadsheet me-1"></i> Excel Experto</h5>
        <p class="text-muted mb-2">Básico (19), Intermedio (20), Avanzado (19) · Promedio 19.33.</p>
        <span class="badge text-bg-success">Excel Básico</span>
        <span class="badge text-bg-success">Intermedio</span>
        <span class="badge text-bg-success">Avanzado</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-warning h-100">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-cup-hot me-1"></i> Java Programming</h5>
        <p class="text-muted mb-2">Universidad Autónoma del Perú — nov 2024 a ene 2026. POO en Java.</p>
        <span class="badge text-bg-warning">Java</span>
        <span class="badge text-bg-warning">POO</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-info h-100">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-database me-1"></i> Database Design &amp; Programming with SQL</h5>
        <p class="text-muted mb-2">Universidad Autónoma del Perú — enero 2026. Diseño de BD y SQL.</p>
        <span class="badge text-bg-info">SQL Server</span>
        <span class="badge text-bg-info">Diseño de BD</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-secondary h-100">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-laptop me-1"></i> Habilidades Digitales</h5>
        <p class="text-muted mb-2">Universidad Autónoma del Perú — sep a nov 2025 · 48 horas.</p>
        <span class="badge text-bg-secondary">Herramientas digitales</span>
        <span class="badge text-bg-secondary">Productividad</span>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="card card-outline card-danger h-100">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-cpu me-1"></i> Webinar Internacional de IA</h5>
        <p class="text-muted mb-2">Universidad Autónoma del Perú — octubre 2024. IA y seguridad ciudadana.</p>
        <span class="badge text-bg-danger">Inteligencia Artificial</span>
      </div>
    </div>
  </div>
</div>

<?php cerrar_layout(); ?>
