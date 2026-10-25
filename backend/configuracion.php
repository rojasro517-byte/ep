<?php
require_once '_layout.php';
require_once 'conexion.php';

$stmt = $pdo->prepare("SELECT username, email, telefono FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$usuario = $stmt->fetch();

abrir_layout('Configuración', 'configuracion');
?>

<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="bi bi-gear-fill me-1"></i> Datos de la cuenta</h3>
  </div>
  <div class="card-body">
    <form>
      <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($usuario['username'] ?? '') ?>" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" value="<?= htmlspecialchars($usuario['email'] ?? $nombreUsuario) ?>" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="tel" class="form-control" value="<?= htmlspecialchars($usuario['telefono'] ?? '') ?>" readonly>
      </div>
      <a href="panel.php" class="btn btn-secondary">Volver al panel</a>
      <a href="logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
    </form>
  </div>
</div>

<?php cerrar_layout(); ?>
