<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Cobro Movil</title>
  <?php
  include '../assets/imports.php';
  include '../db/verify.php';
  include '../css/ASTheme.php';
  include '../js/menuclose.php';
  include '../js/locationRestrict.php';
  $level_login = $_SESSION['level_login'] ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
  <script>
    $(function() {
      $.ajax({
        url: '../db/buscar_oferentes.php',
        dataType: 'json',
        success: function(data) {
          $("#nombreoferente").autocomplete({
            source: data
          });
        }
      });
    });
  </script>
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
              <p class="navbar-text">Nuevo Cobro</p>
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
      <form class="form-horizontal" action="../db/save_oferente.php" method="POST">
        <div class="form-group">
          <label for="nombreoferente" class="col-sm-2 control-label">Oferente</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombreoferente" name="nombreoferente" placeholder="Escriba el nombre" required>
          </div>
        </div>
        <div class="form-group">
          <label for="cantidad" class="col-sm-2 control-label">Cantidad a Pagar</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="$0" required>
          </div>
        </div>
        <div class="form-group">
          <label for="zona" class="col-sm-2 control-label">Zona del oferente</label>
          <div class="col-sm-10">
            <select class="form-control" name="zonas_oferentes" required>
              <?php
              include '../db/conexion.php';
              $sql = "SELECT nombre_zona FROM zonas_oferentes WHERE estatus_zona = 1";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['nombre_zona'] . '">' . $row['nombre_zona'] . '</option>';
                }
              } else {
                echo '<option value="">No hay zonas disponibles</option>';
              }
              $conn->close();
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="notas" class="col-sm-2 control-label">Observaciones</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="notas" name="notas" value="NA">
            <input type="hidden" id="fechora_oferente" name="fechora_oferente">
            <input type="hidden" class="form-control" id="latitud" name="latitud" readonly>
            <input type="hidden" class="form-control" id="longitud" name="longitud" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn ast-button btn-lg btn-block">Cobrar Pago</button>
          </div>
        </div>
      </form>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var now = new Date(); 
        var isoString = now.toISOString();
        var datetimeString = isoString.substring(0, 19).replace('T', ' ');
        document.getElementById('fechora_oferente').value = datetimeString;
      });
      document.addEventListener("DOMContentLoaded", function() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById('latitud').value = position.coords.latitude;
            document.getElementById('longitud').value = position.coords.longitude;
          }, function(error) {
            console.error('Error al obtener la geolocalización: ', error.message);
            document.getElementById('latitud').value = "NA";
            document.getElementById('longitud').value = "NA";
          });
        } else {
          console.error('La geolocalización no es soportada por este navegador.');
          document.getElementById('latitud').value = "NA";
          document.getElementById('longitud').value = "NA";
        }
      });
    </script>
  </ons-page>
</body>
</html>