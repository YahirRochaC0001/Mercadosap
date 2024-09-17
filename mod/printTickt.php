<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Imprimir</title>
  <?php include '../assets/imports.php';
  include '../db/verify.php';
  include '../css/ticktstyle.php';
  include '../js/locationRestrict.php';
  if (isset($_SESSION['datos_guardados'])) {
    $datos = $_SESSION['datos_guardados'];
    unset($_SESSION['datos_guardados']);
  } else {
    header("Location: ../mod/Rcobros.php");
    exit;
  }
  ?>
</head>
<body>
  <ons-page>
    <div class="container">
      <div class="login login-container">
        <a href="../mod/inicio.php" class="btn btn-danger">X</a>
        <div class="text-center">
          <h2 class="login title">Imprimir Ticket</h2>
        </div>
        <br>
        <div class="ticket-container">
          <address>
            <h3><strong>ALTAMIRA</strong></h3>
            <h4><strong>-Somos Todos-</strong></h4>
            <hr>
            <h4><strong>Cobro Mercados Altamira</strong></h4>
            <hr>
            <p><?php echo htmlspecialchars($datos['nombre_oferente']); ?></p>
            <p><?php echo htmlspecialchars($datos['pago_oferente']); ?> MXN</p>
            <p><?php echo htmlspecialchars($datos['zona']); ?></p>
            <p><?php echo htmlspecialchars($datos['fechhora_oferente']); ?></p>
            <hr>
            <div class="ticket-footer">
              <p>¡Gracias por su pago!</p>
            </div>
          </address>
        </div>
        <div class="text-center">
          <a href="../mod/inicio.php" class="btn btn-success btn-lg btn-block">Imprimir</a>
          <a href="../mod/inicio.php" class="btn btn-danger btn-lg btn-block">Terminar</a>
        </div>
  </ons-page>
</body>
</html>