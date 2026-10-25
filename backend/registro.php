<?php
require_once 'conexion.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $email === '' || $telefono === '' || $password === '') {
        $error = "Por favor, completa todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no es válido.";
    } elseif (strlen($password) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        // Verificar que el correo no esté registrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $error = "El correo ya está registrado. Inicia sesión.";
        } else {
            // Encriptar la contraseña antes de guardarla
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Insertar el usuario (consulta preparada con PDO)
            $stmt = $pdo->prepare("INSERT INTO usuarios (username, email, telefono, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $telefono, $passwordHash]);

            // Redirigir al login con mensaje de éxito
            header("Location: login.php?registro=ok");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../login.css">
    <style>
        .signup label { margin: 30px 50px 20px; }
        .signup input { margin: 12px auto; }
        .msg {
            width: 60%;
            margin: 10px auto 0;
            padding: 8px;
            border-radius: 5px;
            font-size: .8em;
            text-align: center;
        }
        .msg.error { background: #ffd2d2; color: #b00020; }
    </style>
</head>
<body>
    <div class="nav-btns">
        <!-- Botón para volver a la página principal -->
        <button type="button" onclick="window.location.href='../index.html'">← Volver a la página principal</button>
    </div>

    <div class="main">
        <!-- chk marcado: el panel de registro queda visible -->
        <input type="checkbox" id="chk" aria-hidden="true" checked>

        <!-- Formulario de registro (envía a este mismo archivo) -->
        <div class="signup">
            <form action="registro.php" method="POST">
                <label for="chk" aria-hidden="true">Regístrate</label>
                <input type="text" name="username" placeholder="Usuario" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
                <input type="email" name="email" placeholder="Correo electrónico" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                <input type="tel" name="telefono" placeholder="Teléfono" value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <?php if ($error): ?>
                    <p class="msg error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                <button type="submit">Registrarme</button>
            </form>
        </div>

        <!-- Formulario de login (envía a login.php) -->
        <div class="login">
            <form action="login.php" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
