<?php
require_once 'conexion.php';
require_once 'Visita.php';

$db = conectarBD();

// Recuperamos los registros de la tabla VISITAS mediante consulta SQL
$stmt = $db->query("SELECT * FROM visita");
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$listaVisitas = [];
foreach ($resultados as $row) {
    // Tratamos la lista resultante como objetos de la clase Visita
    $listaVisitas[] = new Visita(
        $row['IdUser'] ?? $row['IdUsuario'] ?? 1,
        $row['IdPag'] ?? 1,
        $row['FechaVis'] ?? date('Y-m-d'),
        $row['HoraVis'] ?? date('H:i:s')
    );
}

// Serializamos el objeto (la lista completa de visitas)
$objetoSerializado = serialize($listaVisitas);

// Guardamos el contenido serializado en un archivo log
$archivoLog = 'visitas_log.txt';
file_put_contents($archivoLog, $objetoSerializado);

echo "<h2>¡Objeto de visitas serializado y guardado correctamente!</h2>";
echo "<p>Se han guardado los datos en el archivo de registro: <strong>{$archivoLog}</strong></p>";
echo '<br><a href="recuperar_log.php">Ir al paso inverso (Recuperar y Deserializar)</a>';
?>