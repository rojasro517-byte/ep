<?php
declare(strict_types=1);

// Conexión PDO compatible con el hosting compartido de InfinityFree.
$config = require __DIR__ . '/configuracion_bd.php';
foreach (['host', 'database', 'username', 'password'] as $key) {
    if (!isset($config[$key]) || $config[$key] === '' || str_starts_with((string)$config[$key], 'CAMBIAR_POR_')) {
        http_response_code(500);
        error_log('MySQL no configurado: revisa backend/configuracion_bd.php');
        exit('El sitio aún no está conectado a la base de datos. El administrador debe completar la configuración MySQL de InfinityFree.');
    }
}
$charset = $config['charset'] ?? 'utf8mb4';
$dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$charset}";
try {
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_TIMEOUT => 8,
    ]);
} catch (PDOException $e) {
    error_log('Error PDO de conexión: ' . $e->getMessage());
    http_response_code(500);
    exit('No se pudo conectar a MySQL. Verifica el host, nombre de base de datos, usuario y contraseña en el panel de InfinityFree.');
}
