<?php
require_once '_layout.php';

// Conexión a la BD (opcional, por si luego quieres notas reales)
require_once 'conexion.php';

abrir_layout('Notas', 'notas');
?>

<div class="row">
  <div class="col-md-4">
    <div class="small-box text-bg-primary">
      <div class="inner">
        <h3>17.5</h3>
        <p>Promedio general</p>
      </div>
      <i class="small-box-icon bi bi-graph-up-arrow"></i>
    </div>
  </div>
  <div class="col-md-4">
    <div class="small-box text-bg-success">
      <div class="inner">
        <h3>5</h3>
        <p>Cursos aprobados</p>
      </div>
      <i class="small-box-icon bi bi-check-circle"></i>
    </div>
  </div>
  <div class="col-md-4">
    <div class="small-box text-bg-warning">
      <div class="inner">
        <h3>1</h3>
        <p>En curso</p>
      </div>
      <i class="small-box-icon bi bi-hourglass-split"></i>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><i class="bi bi-clipboard-check me-1"></i> Registro de notas</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped table-hover align-middle mb-0">
      <thead>
        <tr>
          <th>Curso</th>
          <th class="text-center">Nota 1</th>
          <th class="text-center">Nota 2</th>
          <th class="text-center">Promedio</th>
          <th class="text-center">Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Programación Orientada a Objetos</td>
          <td class="text-center">18</td>
          <td class="text-center">19</td>
          <td class="text-center"><strong>18.5</strong></td>
          <td class="text-center"><span class="badge text-bg-success">Aprobado</span></td>
        </tr>
        <tr>
          <td>Base de Datos</td>
          <td class="text-center">17</td>
          <td class="text-center">18</td>
          <td class="text-center"><strong>17.5</strong></td>
          <td class="text-center"><span class="badge text-bg-success">Aprobado</span></td>
        </tr>
        <tr>
          <td>Análisis de Datos</td>
          <td class="text-center">16</td>
          <td class="text-center">18</td>
          <td class="text-center"><strong>17</strong></td>
          <td class="text-center"><span class="badge text-bg-success">Aprobado</span></td>
        </tr>
        <tr>
          <td>Automatización con Power Platform</td>
          <td class="text-center">18</td>
          <td class="text-center">17</td>
          <td class="text-center"><strong>17.5</strong></td>
          <td class="text-center"><span class="badge text-bg-success">Aprobado</span></td>
        </tr>
        <tr>
          <td>Ingeniería de Sistemas IV</td>
          <td class="text-center">—</td>
          <td class="text-center">—</td>
          <td class="text-center"><strong>—</strong></td>
          <td class="text-center"><span class="badge text-bg-warning">En curso</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php cerrar_layout(); ?>
