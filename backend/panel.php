<?php
require_once '_layout.php';
require_once 'conexion.php';

// ---- Datos reales desde MySQL ----
$totalUsuarios = (int) $pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();

$stmt = $pdo->prepare("SELECT username, email, telefono, fecha_registro FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$usuario = $stmt->fetch();

// Datos académicos de ejemplo (coherentes con las demás secciones)
$cursos = [
    ['nombre' => 'Programación Orientada a Objetos', 'nota' => 18.5, 'estado' => 'Aprobado', 'color' => 'primary'],
    ['nombre' => 'Base de Datos', 'nota' => 17.5, 'estado' => 'Aprobado', 'color' => 'success'],
    ['nombre' => 'Análisis de Datos', 'nota' => 17.0, 'estado' => 'Aprobado', 'color' => 'warning'],
    ['nombre' => 'Automatización con Power Platform', 'nota' => 17.5, 'estado' => 'Aprobado', 'color' => 'info'],
    ['nombre' => 'Ingeniería de Sistemas IV', 'nota' => null, 'estado' => 'En curso', 'color' => 'danger'],
];

$promedio = 17.5;
$aprobados = 4;
$enCurso = 1;

// ---- Datos para los gráficos ----
// Evolución del promedio por ciclo
$evolucion = [
    'labels' => ['I', 'II', 'III', 'IV'],
    'valores' => [15.8, 16.6, 17.2, 17.5],
];

// Distribución de mis certificaciones por tema
$certificaciones = [
    'labels' => ['Excel', 'Power Platform', 'Java', 'Base de Datos', 'Habilidades Digitales', 'IA'],
    'valores' => [3, 2, 1, 1, 1, 1],
];

abrir_layout('Panel principal', 'inicio');
?>

<!--begin::Bienvenida-->
<div class="row mb-1">
  <div class="col-12">
    <div class="card text-bg-primary bg-gradient border-0">
      <div class="card-body d-flex align-items-center">
        <i class="bi bi-mortarboard-fill me-3" style="font-size: 3rem"></i>
        <div>
          <h4 class="mb-1">¡Bienvenido, <?= htmlspecialchars($usuario['username'] ?? $nombreUsuario) ?>!</h4>
          <p class="mb-0">
            Ingeniería de Sistemas · IV Ciclo · Universidad Autónoma del Perú
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end::Bienvenida-->

<!--begin::Resumen (tarjetas relacionadas)-->
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-primary">
      <div class="inner">
        <h3><?= $promedio ?></h3>
        <p>Promedio general</p>
      </div>
      <i class="small-box-icon bi bi-graph-up-arrow"></i>
      <a href="notas.php" class="small-box-footer">Ver notas <i class="bi bi-arrow-right-circle"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-success">
      <div class="inner">
        <h3><?= $aprobados ?></h3>
        <p>Cursos aprobados</p>
      </div>
      <i class="small-box-icon bi bi-journal-check"></i>
      <a href="cursos.php" class="small-box-footer">Ver cursos <i class="bi bi-arrow-right-circle"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-warning">
      <div class="inner">
        <h3><?= $enCurso ?></h3>
        <p>Cursos en curso</p>
      </div>
      <i class="small-box-icon bi bi-hourglass-split"></i>
      <a href="horario.php" class="small-box-footer">Ver horario <i class="bi bi-arrow-right-circle"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-danger">
      <div class="inner">
        <h3>6</h3>
        <p>Certificaciones</p>
      </div>
      <i class="small-box-icon bi bi-award"></i>
      <a href="certificaciones.php" class="small-box-footer">Ver certificados <i class="bi bi-arrow-right-circle"></i></a>
    </div>
  </div>
</div>
<!--end::Resumen-->

<!--begin::Graficos-->
<div class="row">
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-bar-chart-fill me-1"></i> Notas por curso</h3>
      </div>
      <div class="card-body">
        <canvas id="graficoCursos" height="120"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-pie-chart-fill me-1"></i> Mis certificaciones</h3>
      </div>
      <div class="card-body">
        <canvas id="graficoCertificaciones" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-graph-up-arrow me-1"></i> Evolución de mi promedio general</h3>
      </div>
      <div class="card-body">
        <canvas id="graficoEvolucion" height="90"></canvas>
      </div>
    </div>
  </div>
</div>
<!--end::Graficos-->

<div class="row">
  <!--begin::Rendimiento academico-->
  <div class="col-lg-7">
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-bar-chart-line me-1"></i> Mi rendimiento por curso</h3>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped align-middle mb-0">
          <thead>
            <tr>
              <th>Curso</th>
              <th class="text-center">Nota</th>
              <th class="text-center">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cursos as $c): ?>
              <tr>
                <td><?= htmlspecialchars($c['nombre']) ?></td>
                <td class="text-center">
                  <?= $c['nota'] !== null ? '<strong>' . $c['nota'] . '</strong>' : '—' ?>
                </td>
                <td class="text-center">
                  <span class="badge text-bg-<?= $c['color'] ?>"><?= htmlspecialchars($c['estado']) ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--end::Rendimiento academico-->

  <!--begin::Mis datos-->
  <div class="col-lg-5">
    <div class="card card-outline card-primary mb-4">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-person-badge me-1"></i> Mis datos</h3>
      </div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-5">Usuario</dt>
          <dd class="col-7"><?= htmlspecialchars($usuario['username'] ?? '-') ?></dd>

          <dt class="col-5">Correo</dt>
          <dd class="col-7 text-break"><?= htmlspecialchars($usuario['email'] ?? $nombreUsuario) ?></dd>

          <dt class="col-5">Teléfono</dt>
          <dd class="col-7"><?= htmlspecialchars($usuario['telefono'] ?? '-') ?></dd>

          <dt class="col-5">Carrera</dt>
          <dd class="col-7">Ingeniería de Sistemas</dd>

          <dt class="col-5">Ciclo</dt>
          <dd class="col-7">IV</dd>

          <dt class="col-5">Registro</dt>
          <dd class="col-7"><?= htmlspecialchars($usuario['fecha_registro'] ?? '-') ?></dd>
        </dl>
        <a href="perfil.php" class="btn btn-sm btn-outline-primary mt-3">Ver perfil completo</a>
      </div>
    </div>
  </div>
  <!--end::Mis datos-->
</div>

<!--begin::Accesos rapidos-->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-grid-3x3-gap me-1"></i> Accesos rápidos</h3>
      </div>
      <div class="card-body">
        <div class="row text-center g-2">
          <div class="col-6 col-md-2">
            <a href="perfil.php" class="text-decoration-none">
              <i class="bi bi-person-badge fs-2 text-primary d-block"></i>Perfil
            </a>
          </div>
          <div class="col-6 col-md-2">
            <a href="cursos.php" class="text-decoration-none">
              <i class="bi bi-journal-text fs-2 text-success d-block"></i>Cursos
            </a>
          </div>
          <div class="col-6 col-md-2">
            <a href="notas.php" class="text-decoration-none">
              <i class="bi bi-clipboard-check fs-2 text-warning d-block"></i>Notas
            </a>
          </div>
          <div class="col-6 col-md-2">
            <a href="horario.php" class="text-decoration-none">
              <i class="bi bi-calendar-week fs-2 text-info d-block"></i>Horario
            </a>
          </div>
          <div class="col-6 col-md-2">
            <a href="pagos.php" class="text-decoration-none">
              <i class="bi bi-receipt fs-2 text-danger d-block"></i>Pagos
            </a>
          </div>
          <div class="col-6 col-md-2">
            <a href="certificaciones.php" class="text-decoration-none">
              <i class="bi bi-award fs-2 text-secondary d-block"></i>Certificados
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end::Accesos rapidos-->

<!--begin::Scripts de gráficos-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>
<script>
  (() => {
    'use strict';

    // ¿Tema oscuro activo? (lo fija el layout en data-bs-theme)
    const oscuro = document.documentElement.getAttribute('data-bs-theme') === 'dark';
    const colorTexto = oscuro ? '#dee2e6' : '#212529';
    const colorGrid = oscuro ? 'rgba(255,255,255,.1)' : 'rgba(0,0,0,.08)';

    if (typeof Chart === 'undefined') return;
    Chart.defaults.color = colorTexto;
    Chart.defaults.borderColor = colorGrid;
    Chart.defaults.font.family = "'Source Sans 3', system-ui, sans-serif";

    // 1) Notas por curso (barras horizontales)
    new Chart(document.getElementById('graficoCursos'), {
      type: 'bar',
      data: {
        labels: <?= json_encode(array_map(fn($c) => $c['nombre'], $cursos)) ?>,
        datasets: [{
          label: 'Nota',
          data: <?= json_encode(array_map(fn($c) => $c['nota'] ?? 0, $cursos)) ?>,
          backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#0dcaf0', '#dc3545'],
          borderRadius: 6,
        }],
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { beginAtZero: true, max: 20, ticks: { stepSize: 5 } },
        },
      },
    });

    // 2) Certificaciones por tema (dona)
    new Chart(document.getElementById('graficoCertificaciones'), {
      type: 'doughnut',
      data: {
        labels: <?= json_encode($certificaciones['labels']) ?>,
        datasets: [{
          data: <?= json_encode($certificaciones['valores']) ?>,
          backgroundColor: ['#198754', '#0d6efd', '#ffc107', '#0dcaf0', '#6c757d', '#dc3545'],
        }],
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } } },
      },
    });

    // 3) Evolución del promedio (línea)
    new Chart(document.getElementById('graficoEvolucion'), {
      type: 'line',
      data: {
        labels: <?= json_encode($evolucion['labels']) ?>,
        datasets: [{
          label: 'Promedio',
          data: <?= json_encode($evolucion['valores']) ?>,
          borderColor: '#0d6efd',
          backgroundColor: 'rgba(13,110,253,.15)',
          fill: true,
          tension: 0.35,
          pointRadius: 5,
          pointBackgroundColor: '#0d6efd',
        }],
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: { beginAtZero: false, suggestedMin: 14, suggestedMax: 20 },
        },
      },
    });
  })();
</script>
<!--end::Scripts de gráficos-->

<?php cerrar_layout(); ?>
