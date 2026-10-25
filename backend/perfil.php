<?php
require_once '_layout.php';
require_once 'conexion.php';

// Datos del usuario desde la BD
$stmt = $pdo->prepare("SELECT id, username, email, telefono, fecha_registro FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$usuario = $stmt->fetch();

abrir_layout('Mi perfil', 'perfil');
?>

<div class="row">
  <div class="col-md-4">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile text-center">
        <i class="bi bi-person-circle text-primary" style="font-size: 6rem"></i>
        <h3 class="profile-username mt-2"><?= htmlspecialchars($usuario['username'] ?? 'Estudiante') ?></h3>
        <p class="text-muted">Ingeniería de Sistemas</p>
        <ul class="list-group list-group-unbordered mb-3 text-start">
          <li class="list-group-item"><b>Correo:</b> <span class="float-end"><?= htmlspecialchars($usuario['email'] ?? $nombreUsuario) ?></span></li>
          <li class="list-group-item"><b>Teléfono:</b> <span class="float-end"><?= htmlspecialchars($usuario['telefono'] ?? '-') ?></span></li>
          <li class="list-group-item"><b>Registro:</b> <span class="float-end"><?= htmlspecialchars($usuario['fecha_registro'] ?? '-') ?></span></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-mortarboard-fill me-1"></i> Información académica</h3>
      </div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-4">Nombre completo</dt>
          <dd class="col-sm-8">Marcelo Gustavo Rojas Rivas</dd>

          <dt class="col-sm-4">Carrera</dt>
          <dd class="col-sm-8">Ingeniería de Sistemas</dd>

          <dt class="col-sm-4">Ciclo</dt>
          <dd class="col-sm-8">IV Ciclo</dd>

          <dt class="col-sm-4">Universidad</dt>
          <dd class="col-sm-8">Universidad Autónoma del Perú</dd>

          <dt class="col-sm-4">Facultad</dt>
          <dd class="col-sm-8">Ingeniería y Arquitectura</dd>

          <dt class="col-sm-4">Periodo</dt>
          <dd class="col-sm-8">2024 – Presente</dd>

          <dt class="col-sm-4">Certificaciones</dt>
          <dd class="col-sm-8">6 obtenidas</dd>

          <dt class="col-sm-4">Sede</dt>
          <dd class="col-sm-8">Lima, Perú</dd>
        </dl>
      </div>
    </div>
  </div>
</div>

<?php cerrar_layout(); ?>
