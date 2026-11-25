<?php
include 'conexion.php';

// Procesar inserción
if (isset($_POST['guardar'])) {
    $nombre = $_POST['NombreSuscrip'];
    $sql = "INSERT INTO SUSCRIPCION (NombreSuscrip) VALUES ('$nombre')";
    mysqli_query($conexion, $sql);
    header("Location: suscripciones.php");
    exit();
}

// Procesar eliminación
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM SUSCRIPCION WHERE IdSuscrip = $id";
    mysqli_query($conexion, $sql);
    header("Location: suscripciones.php");
    exit();
}
	
// Procesar actualización
if (isset($_POST['actualizar'])) {
    $id = $_POST['actualizar'];
    $nombre = $_POST['NombreSuscrip'];	
    $sql = "UPDATE SUSCRIPCION SET NombreSuscrip = '$nombre' WHERE IdSuscrip = "  .$_POST['idActualiz'];
   //echo "$sql <br><br>";
    mysqli_query($conexion, $sql);
    header("Location: suscripciones.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Suscripcion</title>
</head>
<body>
    <a href="index.php">← Volver al Inicio</a>
    <h2>Gestión de Suscripciones</h2>
    
	<?php
	$idSusc = "-1";		
	$nomSusc = "--";
	
	if (isset($_GET['formActualizar'])){

		$sqlSelectWhere = "SELECT * FROM SUSCRIPCION WHERE IdSuscrip=" .$_GET['formActualizar']. "";
		//echo "$sqlSelectWhere <br>";
		$resul = mysqli_query($conexion, $sqlSelectWhere);
        while ($regist = mysqli_fetch_assoc($resul)) {
            $idSusc = $regist['IdSuscrip']; 
			$nomSusc = $regist['NombreSuscrip'];
		}
	?>	
	<!-- Formulario de Modificación -->
	<form action="suscripciones.php" method="POST">
	    <label>Nombre Nación:</label>
        <input type="text" name="NombreSuscrip" value="<?php echo $nomSusc;?>" maxlength="25" required>
		&nbsp;<?&php echo "&nbsp;(id: $idSusc)"; ?>
		<input type="hidden" name="idActualiz" value="<?php echo $idSusc;?>">
        <button type="submit" name="actualizar">Modificar</button>
    </form>
	<?php
	} else {
	   //if (isset($_GET['actualizar'])){
	?>
    <!-- Formulario de Registro -->
    <form action="suscripciones.php" method="POST">
        <label>Nombre Suscripción:</label>
        <input type="text" name="NombreSuscrip" maxlength="25" required>
        <button type="submit" name="guardar">Registrar</button>
    </form>
	<?php
	}
	?>
	
    <hr>

    <!-- Listado -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre Suscripción</th>
            <th>Acciones</th>
        </tr>
        <?php
        $resultado = mysqli_query($conexion, "SELECT * FROM SUSCRIPCION");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['IdSuscrip'] . "</td>";
            echo "<td>" . $fila['NombreSuscrip'] . "</td>";
			echo "<td><a href='suscripciones.php?formActualizar=" . $fila['IdSuscrip'] . "'>Actualizar</a></td>";			
            echo "<td><a href='suscripciones.php?eliminar=" . $fila['IdSuscrip'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>