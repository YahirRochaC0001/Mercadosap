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
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 500px; /* Ajusta la altura del mapa según sea necesario */
      width: 100%;
    }
  </style>
</head>

<body>
  <ons-page>
    <ons-toolbar>
      <div class="bs-example bs-navbar-top-example" data-example-id="navbar-fixed-to-top">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-responsive" aria-expanded="false">
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
          <h4 class="panel-title">Historial de Cobros</h4>
        </div>
        <div class="panel-body">
          <p>La contraseña es el nombre de usuario del que está iniciado la sesión ahora mismo</p>
          <p><a class="btn ast-button btn-block" href="../db/hist_de_cobros.php" role="button">Descargar Informe</a></p>
          <!-- Contenedor para el mapa -->
          <div id="map"></div>
        </div>
      </div>
    </div>
  </ons-page>
  
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    function initMap() {
      // Inicializa el mapa y establece la vista inicial
      var map = L.map('map').setView([0, 0], 2); // Ajusta la vista inicial según sea necesario

      // Añade la capa de teselas
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // Obtiene los datos de ubicación desde el servidor
      fetch('../db/hist_de_cobros.php')
        .then(response => response.json())
        .then(data => {
          data.forEach(location => {
            L.marker([location.latitud, location.longitud]).addTo(map)
              .bindPopup('<b>' + location.nombre + '</b><br>' + location.fecha);
          });

          // Ajusta el mapa para mostrar todos los marcadores
          if (data.length > 0) {
            var bounds = L.latLngBounds(data.map(location => [location.latitud, location.longitud]));
            map.fitBounds(bounds);
          }
        })
        .catch(error => console.error('Error:', error));
    }

    // Inicializa el mapa cuando la página se haya cargado
    window.onload = initMap;
  </script>
</body>

</html>
