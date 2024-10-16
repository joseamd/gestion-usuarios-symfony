<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark d-flex justify-content-between">
    <h1 class="text-white">Gestión de Usuarios</h1>

    <!-- Menú Desplegable -->
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="/images/user.png" alt="Usuario" style="width: 40px; height: 40px; border-radius: 50%;">
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo url_for('user/configuration') ?>">Configuración</a>
            <a class="dropdown-item" href="<?php echo url_for('user/logout') ?>">Cerrar sesión</a>
        </div>
    </div>
  </nav>


    <?php echo $sf_content ?>
    <!-- Bootstrap JS and dependencies (like jQuery if needed) -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
