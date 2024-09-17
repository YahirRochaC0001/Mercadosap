<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio de Sesión</title>
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
        <h2 class="login title">Crear Nuevo Usuario</h2>
        <form action="../db/crear_user.php" method="POST">
          <div class="form-group">
            <label for="user_login">Usuario</label>
            <input type="text" class="form-control" id="user_login" name="user_login" placeholder="Ingresa el usuario"
              required>
          </div>
          <div class="form-group">
            <label for="pass_login">Contraseña</label>
            <input type="password" class="form-control" id="pass_login" name="pass_login"
              placeholder="Ingresa la contraseña" required>
          </div>
          <div class="form-group">

            <label for="level_login">Nivel de Acceso</label><br>
            <label for="level_login">ADMIN = 1 COMUN = 0</label>
            <select class="form-control"  id="level_login" name="level_login" required>
              <option value="0">0</option>;
              <option value="1">1</option>;
            </select>
          </div>
          <button type="submit" class="btn ast-button btn-lg btn-block">Crear Usuario</button>
        </form>
      </div>
    </div>
  </ons-page>
</body>
</html>