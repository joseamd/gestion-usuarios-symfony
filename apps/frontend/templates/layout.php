<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <h1 class="text-white" class="text-center">Gestión de Usuarios</h1>
    </nav>
    <?php echo $sf_content ?>
    <!-- Bootstrap JS and dependencies (like jQuery if needed) -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
