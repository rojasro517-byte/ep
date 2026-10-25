<?php
/**
 * Layout común para la intranet de academia.
 * Provee el header, el sidebar (con el ítem activo) y el botón de regreso.
 *
 * Uso:
 *   require_once '_layout.php';
 *   abrir_layout('Notas', 'notas');   // titulo, clave de menu activo
 *   ... contenido HTML ...
 *   cerrar_layout();
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protección de sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$nombreUsuario = $_SESSION['usuario_email'];

/** Devuelve true si el menú dado es el activo. */
function es_activo($clave, $activo)
{
    return $clave === $activo ? ' active' : '';
}

/** Abre el documento: head, header y sidebar. */
function abrir_layout($titulo, $activo)
{
    global $nombreUsuario;
    ?>
<!doctype html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= htmlspecialchars($titulo) ?> | Mi Academia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <script>
      (() => {
        'use strict';
        const root = document.documentElement;
        if (root.getAttribute('data-lte-color-mode') === 'off') return;
        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try { stored = localStorage.getItem(STORAGE_KEY); } catch {}
        const authored = root.getAttribute('data-bs-theme');
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') resolved = stored;
        else if (authored === 'dark' || authored === 'light') resolved = authored;
        else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) resolved = 'dark';
        root.setAttribute('data-bs-theme', resolved);
        root.style.colorScheme = resolved;
      })();
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.3.0/index.css" crossorigin="anonymous" media="print" onload="this.media = 'all'" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="../admin/css/adminlte.min.css" />
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block">
              <a href="panel.php" class="nav-link">
                <i class="bi bi-grid-1x2 me-1" aria-hidden="true"></i>
                Panel principal
              </a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1 fs-5"></i>
                <span class="d-none d-xl-inline"><?= htmlspecialchars($nombreUsuario) ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <i class="bi bi-person-circle" style="font-size: 4rem"></i>
                  <p>
                    <?= htmlspecialchars($nombreUsuario) ?>
                    <small>Sesión activa</small>
                  </p>
                </li>
                <li class="user-footer">
                  <a href="logout.php" class="btn btn-outline-danger w-100">Cerrar sesión</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!--end::Header-->

      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="panel.php" class="brand-link">
            <img src="../admin/assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Mi Academia</span>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation">
              <li class="nav-item">
                <a href="panel.php" class="nav-link<?= es_activo('inicio', $activo) ?>">
                  <i class="nav-icon bi bi-speedometer2"></i>
                  <p>Inicio</p>
                </a>
              </li>

              <li class="nav-header">ACADÉMICO</li>
              <li class="nav-item">
                <a href="perfil.php" class="nav-link<?= es_activo('perfil', $activo) ?>">
                  <i class="nav-icon bi bi-person-badge"></i>
                  <p>Mi perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cursos.php" class="nav-link<?= es_activo('cursos', $activo) ?>">
                  <i class="nav-icon bi bi-journal-text"></i>
                  <p>Mis cursos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="notas.php" class="nav-link<?= es_activo('notas', $activo) ?>">
                  <i class="nav-icon bi bi-clipboard-check"></i>
                  <p>Notas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="horario.php" class="nav-link<?= es_activo('horario', $activo) ?>">
                  <i class="nav-icon bi bi-calendar-week"></i>
                  <p>Horario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pagos.php" class="nav-link<?= es_activo('pagos', $activo) ?>">
                  <i class="nav-icon bi bi-receipt"></i>
                  <p>Pagos / Matrícula</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificaciones.php" class="nav-link<?= es_activo('certificaciones', $activo) ?>">
                  <i class="nav-icon bi bi-award-fill"></i>
                  <p>Certificaciones</p>
                </a>
              </li>

              <li class="nav-header">COMUNICACIÓN</li>
              <li class="nav-item">
                <a href="mensajes.php" class="nav-link<?= es_activo('mensajes', $activo) ?>">
                  <i class="nav-icon bi bi-inbox"></i>
                  <p>Mensajes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="faq.php" class="nav-link<?= es_activo('faq', $activo) ?>">
                  <i class="nav-icon bi bi-question-circle"></i>
                  <p>Preguntas frecuentes</p>
                </a>
              </li>

              <li class="nav-header">MI CUENTA</li>
              <li class="nav-item">
                <a href="configuracion.php" class="nav-link<?= es_activo('configuracion', $activo) ?>">
                  <i class="nav-icon bi bi-gear-fill"></i>
                  <p>Configuración</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="nav-icon bi bi-box-arrow-right"></i>
                  <p>Cerrar sesión</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!--end::Sidebar-->

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3"><?= htmlspecialchars($titulo) ?></h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="panel.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($titulo) ?></li>
                    <li class="breadcrumb-item">
                      <!-- Botón para volver a la página principal -->
                      <button type="button" class="btn btn-sm btn-outline-primary" onclick="window.location.href='../index.html'">
                        <i class="bi bi-arrow-left"></i> Volver a la página principal
                      </button>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!--end::App Content Header-->

        <!--begin::App Content-->
        <div class="app-content">
          <div class="container-fluid">
    <?php
}

/** Cierra el documento: footer y scripts. */
function cerrar_layout()
{
    ?>
          </div>
        </div>
        <!--end::App Content-->

        <!--begin::Footer-->
        <footer class="app-footer">
          <div class="float-end d-none d-sm-inline">
            <a href="panel.php" class="text-decoration-none">
              <i class="bi bi-arrow-left"></i> Volver al panel
            </a>
          </div>
          <strong>&copy; 2026 Marcelo Gustavo Rojas Rivas.</strong> Mi Academia.
        </footer>
        <!--end::Footer-->
      </main>
      <!--end::App Main-->
    </div>
    <!--end::App Wrapper-->

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../admin/js/adminlte.min.js"></script>
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = { scrollbarTheme: 'os-theme-light', scrollbarAutoHide: 'leave', scrollbarClickScroll: true };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        const isMobile = window.innerWidth <= 992;
        if (sidebarWrapper && globalThis.OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined && !isMobile) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: { theme: Default.scrollbarTheme, autoHide: Default.scrollbarAutoHide, clickScroll: Default.scrollbarClickScroll },
          });
        }
      });
    </script>
  </body>
</html>
    <?php
}
