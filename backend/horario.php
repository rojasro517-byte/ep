<?php
require_once '_layout.php';
require_once 'conexion.php';

abrir_layout('Horario', 'horario');
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><i class="bi bi-calendar-week me-1"></i> Horario semanal — Cursos Complementarios</h3>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-bordered text-center align-middle mb-0">
        <thead class="table-dark">
          <tr>
            <th>Día</th>
            <th>Hora</th>
            <th>Curso</th>
            <th>Aula</th>
            <th>Docente</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-light"><strong>Lunes</strong></td>
            <td>08:00 - 11:00</td>
            <td class="table-primary">TRANSFORMACIÓN DIGITAL Y TENDENCIAS TECNOLÓGICAS</td>
            <td>Zoom</td>
            <td>RECALDE PEÑA, FRESHY ANALY</td>
          </tr>
          <tr>
            <td class="table-light"><strong>Martes</strong></td>
            <td>19:30 - 22:30</td>
            <td class="table-success">REDES Y CONECTIVIDAD EMPRESARIAL - CCNA II</td>
            <td>B-301 (Laboratorio de Cómputo)</td>
            <td>BENITES TOLEDO, PEDRO DE LIMA SALOMON</td>
          </tr>
          <tr>
            <td class="table-light"><strong>Miércoles</strong></td>
            <td>18:00 - 21:00</td>
            <td class="table-info">INGLÉS IV</td>
            <td>Zoom</td>
            <td>ISIDRO FABIAN, ROGER EDWIN</td>
          </tr>
          <tr>
            <td class="table-light"><strong>Viernes</strong></td>
            <td>08:45 - 11:45</td>
            <td class="table-warning">ANÁLISIS INFERENCIAL DE DATOS</td>
            <td>B-302 (Laboratorio de Cómputo)</td>
            <td>TERREL DE LA CRUZ, JOSSELINE MARGORETH</td>
          </tr>
          <tr>
            <td class="table-light"><strong>Sábado</strong></td>
            <td>17:15 - 18:45</td>
            <td class="table-danger">REDES Y CONECTIVIDAD EMPRESARIAL - CCNA II</td>
            <td>J-213 (Laboratorio de Cómputo)</td>
            <td>BENITES TOLEDO, PEDRO DE LIMA SALOMON</td>
          </tr>
          <tr>
            <td class="table-light"><strong>Sábado</strong></td>
            <td>18:45 - 20:15</td>
            <td class="table-secondary">PROGRAMACIÓN CONCURRENTE Y DISTRIBUIDA</td>
            <td>J-213 (Laboratorio de Cómputo)</td>
            <td>HUANCAHUIRE BRAVO, CLAUDIO ISAIAS</td>
          </tr>
          <tr>
            <td class="table-light"><strong>Domingo</strong></td>
            <td>09:00 - 11:15</td>
            <td class="table-primary">PROGRAMACIÓN CONCURRENTE Y DISTRIBUIDA</td>
            <td>B-301 (Laboratorio de Cómputo)</td>
            <td>HUANCAHUIRE BRAVO, CLAUDIO ISAIAS</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php cerrar_layout(); ?>
