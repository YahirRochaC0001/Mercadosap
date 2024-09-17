<html>
<html lang="es">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<title>Imprimir</title>
	<?php
	session_start();
	include '../assets/imports.php';
	include '../js/print.php';
	include '../css/ticktstyle.php';

	if (isset($_SESSION['datos_guardados'])) {
		$datos = $_SESSION['datos_guardados'];
		// Limpiar los datos de la sesión después de usarlos para evitar mostrar datos antiguos
		unset($_SESSION['datos_guardados']);
	}

	?>
</head>
<script type="text/javascript" src="../BrowserPrint-3.1.250.min.js"></script>
<script type="text/javascript">
	// Función para enviar el ticket a la impresora
	function printTicket() {
		var zpl = `
^XA
^CF0,25  // Tamaño de fuente ajustado

// Encabezado en negritas
^FO50,30^A0N,35,35^FB550,1,,^B0N,35,35^FDALTAMIRA SOMOS TODOS^FS

// Subtítulo en formato normal
^FO50,70^A0N,30,30^FDCobro Mercados Altamira^FS

// Línea separadora
^FO50,100^GB550,3,3^FS

// Información
^FO50,120^A0N,25,25^FDNombre: <?php echo htmlspecialchars($datos['nombre_oferente']); ?>^FS
^FO50,150^A0N,25,25^FDPago: <?php echo htmlspecialchars($datos['pago_oferente']); ?> MXN^FS
^FO50,180^A0N,25,25^FDZona: <?php echo htmlspecialchars($datos['zona']); ?>^FS
^FO50,210^A0N,25,25^FDFecha: <?php echo htmlspecialchars($datos['fechhora_oferente']); ?>^FS

// Línea separadora
^FO50,240^GB550,3,3^FS

// Mensaje de agradecimiento
^FO50,260^A0N,25,25^FD-------- Gracias Por Su Pago --------^FS

^XZ
`;

		writeToSelectedPrinter(zpl);
	}
</script>
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
				Selected Device: <select id="selected_device" onchange=onDeviceSelected(this);></select>
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
				<!-- Botón para imprimir -->
				<div class="text-center">
					<input type="button" value="Imprimir" onclick="printTicket()" class="btn btn-success btn-lg btn-block">
					<a href="../mod/inicio.php" class="btn btn-danger btn-lg btn-block">Cancelar</a>

				</div>
	</ons-page>
</body>

</html>