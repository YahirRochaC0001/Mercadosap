<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dar de baja Zona</title>
  <?php 
  include '../assets/imports.php';
  include '../db/verify.php';
  include '../css/ASTheme.php';
  include '../js/locationRestrict.php';
  ?>
  <link rel="stylesheet" href="../css/form-style.css">
</head>
<body>
  <ons-page>
    <div class="container">
      <div class="login login-container">
        <a href="../mod/altas.php" class="btn btn-danger">X</a>
        <h2 class="login title">Baja de Zonas</h2>
        <form action="../db/updatezona.php" method="POST">
          <div class="form-group">
            <select class="form-control" name="nombre_zona" required>
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
          <div class="form-group">
            <label for="observaciones_de_baja">Razón de baja</label>
            <input type="text" class="form-control" id="observaciones_de_baja" name="observaciones_de_baja"
              placeholder="Escriba la razón de la baja aquí..." required>
          </div>

          <!-- Campo oculto para estatus_zona -->
          <input type="hidden" name="estatus_zona" value="0">

          <button type="submit" class="btn ast-button btn-lg btn-block">Eliminar</button>
        </form>
      </div>
    </div>
  </ons-page>
</body>
</html>
