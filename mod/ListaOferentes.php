<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Cobro Movil</title>
  <?php include '../assets/imports.php';
  include '../db/verify.php';
  include '../css/ASTheme.php';
  include '../js/locationRestrict.php';
  include '../js/locationRestrict.php';
  $level_login = $_SESSION['level_login']
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
              <p class="navbar-text">Lista de oferentes</p>
            </div>
            <div class="collapse navbar-collapse" id="menu-responsive">
              <ul class="nav navbar-nav">
                <li><a href="../mod/inicio.php">Inicio</a></li>
                <li><a href="../mod/Rcobros.php">Nuevo Cobro</a></li>
                <li><a href="../mod/ListaOferentes.php">Lista de Oferentes</a></li>
                <?php if ($level_login == 1): ?>
                  <li><a href="../mod/altas.php">Altas y Bajas</a></li>
                <?php endif; ?>
                <li><a href="../mod/informecobros.php">Descargar Informe</a></li>
                <li><a href="../db/logout.php">Cerrar Sesion</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </ons-toolbar>
    <br>
    <div class="container">
      <label for="zona">Zona del oferente</label>
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
    <br>
    <div class="container">
      <label for="oferentelistacontainer">Oferentes Registrados</label>
      <select multiple class="form-control" id="oferentelistacontainer">
        <?php
        include '../db/conexion.php';
        $sql = "SELECT id_pago_oferente, nombre_oferente FROM cobrosoferente";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id_pago_oferente"] . "'>" . $row["id_pago_oferente"] . " - " . $row["nombre_oferente"] . "</option>";
          }
        } else {
          echo "<option>No hay oferentes registrados</option>";
        }
        $conn->close();
        ?>
      </select>
      <br>
      <a class="btn ast-button btn-lg btn-block" href="../mod/inicio.php" role="button">Cobrar</a>
    </div>
  </ons-page>
</body>
</html>