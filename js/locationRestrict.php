    <script>
        function checkLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                    },
                    function(error) {
                        alert('La ubicación es necesaria para acceder a esta página. Por favor, habilita los servicios de ubicación en tu dispositivo.');
                         window.location.href = '/MERCADOS/index.php';
                       
                    }
                );
            } else {
                alert('Tu navegador no soporta la API de geolocalización. Por favor, habilita los servicios de ubicación en tu dispositivo.');
            }
        }
        window.onload = checkLocation;
    </script>