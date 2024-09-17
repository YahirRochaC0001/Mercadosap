<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear Nueva Zona</title>
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
            <h2 class="login title">Crear Nueva Zona</h2>
            <form action="../db/save_zona.php" method="POST">
                <div class="form-group">
                    <label for="nombre_zona">Nombre del lugar</label>
                    <input type="text" class="form-control" id="nombre_zona" name="nombre_zona" placeholder="Fracc, Col etc..." required>
                </div>
                <div class="form-group">
                    <label for="descripcion_zona">Descripción</label>
                    <input type="text" class="form-control" id="descripcion_zona" name="descripcion_zona" placeholder="Ubicada en...." required>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="estatus_zona" name="estatus_zona" value="1">
                </div>
                <button type="submit" class="btn ast-button btn-lg btn-block">Guardar</button>
            </form>
        </div>
    </div>
  </ons-page>
</body>
</html>
