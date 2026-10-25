<?php
require_once '_layout.php';
require_once 'conexion.php';

abrir_layout('Pagos / Matrícula', 'pagos');
?>

<div class="row">
  <div class="col-md-4">
    <div class="small-box text-bg-success">
      <div class="inner">
        <h3><sup class="fs-5">S/</sup> 2,750</h3>
        <p>Total pagado</p>
      </div>
      <i class="small-box-icon bi bi-cash-coin"></i>
    </div>
  </div>
  <div class="col-md-4">
    <div class="small-box text-bg-warning">
      <div class="inner">
        <h3><sup class="fs-5">S/</sup> 0</h3>
        <p>Pendiente</p>
      </div>
      <i class="small-box-icon bi bi-exclamation-circle"></i>
    </div>
  </div>
  <div class="col-md-4">
    <div class="small-box text-bg-primary">
      <div class="inner">
        <h3>5</h3>
        <p>Cuotas pagadas</p>
      </div>
      <i class="small-box-icon bi bi-receipt"></i>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><i class="bi bi-receipt me-1"></i> Historial de pagos</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped table-hover align-middle mb-0">
      <thead>
        <tr>
          <th>N.º</th>
          <th>Concepto</th>
          <th>Fecha</th>
          <th class="text-end">Monto</th>
          <th class="text-center">Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>001</td>
          <td>Matrícula 2026-I</td>
          <td>05/03/2026</td>
          <td class="text-end">S/ 350.00</td>
          <td class="text-center"><span class="badge text-bg-success">Pagado</span></td>
        </tr>
        <tr>
          <td>002</td>
          <td>Cuota 1</td>
          <td>02/04/2026</td>
          <td class="text-end">S/ 600.00</td>
          <td class="text-center"><span class="badge text-bg-success">Pagado</span></td>
        </tr>
        <tr>
          <td>003</td>
          <td>Cuota 2</td>
          <td>02/05/2026</td>
          <td class="text-end">S/ 600.00</td>
          <td class="text-center"><span class="badge text-bg-success">Pagado</span></td>
        </tr>
        <tr>
          <td>004</td>
          <td>Cuota 3</td>
          <td>02/06/2026</td>
          <td class="text-end">S/ 600.00</td>
          <td class="text-center"><span class="badge text-bg-success">Pagado</span></td>
        </tr>
        <tr>
          <td>005</td>
          <td>Cuota 4</td>
          <td>02/07/2026</td>
          <td class="text-end">S/ 600.00</td>
          <td class="text-center"><span class="badge text-bg-success">Pagado</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php cerrar_layout(); ?>
