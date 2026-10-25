<?php
session_start();
require_once 'conexion.php';

// Si ya inició sesión, redirigir al panel
if (isset($_SESSION['usuario_id'])) {
    header("Location: panel.php");
    exit;
}

$error = '';
$exito = isset($_GET['registro']) ? "¡Registro exitoso! Ahora inicia sesión con tu correo y contraseña." : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = "Por favor ingresa todos los campos.";
    } else {
        // Buscar el usuario por correo (consulta preparada contra MySQL)
        $stmt = $pdo->prepare("SELECT id, email, password FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        // Verificar la contraseña encriptada
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Prevenir fijación de sesión por seguridad
            session_regenerate_id(true);

            $_SESSION['usuario_id']    = $usuario['id'];
            $_SESSION['usuario_email'] = $usuario['email'];

            header("Location: panel.php");
            exit;
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
        .msg.exito { background: #d4f7d4; color: #1b7a1b; }
    </style>
</head>
<body>
    <div class="nav-btns">
        <!-- Botón para volver a la página principal -->
        <button type="button" onclick="window.location.href='../index.html'">← Volver a la página principal</button>
    </div>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <!-- Formulario de registro (envía a registro.php) -->
        <div class="signup">
            <form action="registro.php" method="POST">
                <label for="chk" aria-hidden="true">Regístrate</label>
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="tel" name="telefono" placeholder="Teléfono" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Registrarme</button>
            </form>
        </div>

        <!-- Formulario de login (envía a este mismo archivo) -->
        <div class="login">
            <form action="login.php" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <?php if ($error): ?>
                    <p class="msg error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                <?php if ($exito): ?>
                    <p class="msg exito"><?= htmlspecialchars($exito) ?></p>
                <?php endif; ?>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
