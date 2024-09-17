<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Cobro Movil</title>
  <?php
  include '../assets/imports.php';
  include '../db/verify.php';
  include '../db/conexion.php';
  include '../css/ASTheme.php';
  include '../js/menuclose.php';
  include '../js/locationRestrict.php';
  $user_login = $_SESSION['user_login'];
  $level_login = $_SESSION['level_login'];
  ?>
</head>
<body>
  <ons-page>
    <ons-toolbar>
      <div class="bs-example bs-navbar-top-example" data-example-id="navbar-fixed-to-top">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#menu-responsive" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../mod/inicio.php">Cobro Movil</a>
              <p class="navbar-text">Informe de cobros</p>
            </div>
            <div class="collapse navbar-collapse" id="menu-responsive">
              <ul class="nav navbar-nav">
                <li><a href="../mod/inicio.php">Inicio</a></li>
                <li><a href="../mod/Rcobros.php">Nuevo Cobro</a></li>
                <!-- <li><a href="../mod/ListaOferentes.php">Lista de Oferentes</a></li> -->
                <?php if ($level_login == 1): ?>
                  <li><a href="../mod/altas.php">Altas y Bajas</a></li>
                <?php endif; ?>
                <li><a href="../mod/informecobros.php">Descargar Informe</a></li>
                <li><a href="../mod/historial_cobros.php">Historial de Cobros</a></li>
                <li><a href="../db/logout.php">Cerrar Sesion</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </ons-toolbar>
    <br>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Informe de cobros</h4>
        </div>
        <div class="panel-body">
          <p>La contraseña es el nombre de usuario del que esta iniciado la sesion ahora mismo</p>
          <p><a class="btn ast-button btn-block" href="../db/descargar_informe_cobros.php" role="button">Descargar Informe</a></p>
        </div>
      </div>
    </div>
  </ons-page>
</body>
</html>