<?php
require_once 'Visita.php'; // Necesario para que PHP reconozca la estructura de la clase al deserializar

$archivoLog = 'visitas_log.txt';

if (file_exists($archivoLog)) {
    // Leemos el contenido serializado del archivo Log
    $contenidoSerializado = file_get_contents($archivoLog);

    // Deserializamos el objeto
    $visitasDeserializadas = unserialize($contenidoSerializado);

    echo "<h2>Contenido Recuperado y Deserializado desde el Log:</h2>";
    
    if (!empty($visitasDeserializadas)) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Id Usuario</th><th>Id Página</th><th>Fecha Visita</th><th>Hora Visita</th></tr>";
        
        foreach ($visitasDeserializadas as $visita) {
            echo "<tr>";
            echo "<td>" . $visita->getIdUser() . "</td>";
            echo "<td>" . $visita->getIdPag() . "</td>";
            echo "<td>" . $visita->getFechaVis() . "</td>";
            echo "<td>" . $visita->getHoraVis() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>El archivo log está vacío.</p>";
    }
} else {
    echo "<p>El archivo de log no existe todavía. Ejecuta primero <a href='guardar_log.php'>guardar_log.php</a>.</p>";
}

echo '<br><br><a href="guardar_log.php">Volver a generar el Log</a>';
?>