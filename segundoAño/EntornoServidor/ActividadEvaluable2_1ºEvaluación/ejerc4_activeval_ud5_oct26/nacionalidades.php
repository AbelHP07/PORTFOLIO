<?php
include 'conexion.php';

// Procesar inserción
if (isset($_POST['guardar'])) {
    $nombre = $_POST['NombreNacion'];
    $sql = "INSERT INTO NACIONALIDAD (NombreNacion) VALUES ('$nombre')";
    mysqli_query($conexion, $sql);
    header("Location: nacionalidades.php");
    exit();
}

// Procesar eliminación
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM NACIONALIDAD WHERE IdNacion = $id";
    mysqli_query($conexion, $sql);
    header("Location: nacionalidades.php");
    exit();
}
	
// Procesar actualización
if (isset($_POST['actualizar'])) {
    $id = $_POST['actualizar'];
    $nombre = $_POST['NombreNacion'];	
    $sql = "UPDATE NACIONALIDAD SET NombreNacion = '$nombre' WHERE IdNacion = "  .$_POST['idActualiz'];
   //echo "$sql <br><br>";
    mysqli_query($conexion, $sql);
    header("Location: nacionalidades.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Nacionalidad</title>
</head>
<body>
    <a href="index.php">← Volver al Inicio</a>
    <h2>Gestión de Nacionalidades</h2>
    
	<?php
	$idNaci = "-1";		
	$nomNaci = "--";
	
	if (isset($_GET['formActualizar'])){

		$sqlSelectWhere = "SELECT * FROM NACIONALIDAD WHERE IdNacion=" .$_GET['formActualizar']. "";
		//echo "$sqlSelectWhere <br>";
		$resul = mysqli_query($conexion, $sqlSelectWhere);
        while ($regist = mysqli_fetch_assoc($resul)) {
            $idNaci = $regist['IdNacion']; 
			$nomNaci = $regist['NombreNacion'];
		}
	?>	
	<!-- Formulario de Modificación -->
	<form action="nacionalidades.php" method="POST">
	    <label>Nombre Nación:</label>
        <input type="text" name="NombreNacion" value="<?php echo $nomNaci;?>" maxlength="25" required>
		&nbsp;<?&php echo "&nbsp;(id: $idNaci)"; ?>
		<input type="hidden" name="idActualiz" value="<?php echo $idNaci;?>">
        <button type="submit" name="actualizar">Modificar</button>
    </form>
	<?php
	} else {
	   //if (isset($_GET['actualizar'])){
	?>
    <!-- Formulario de Registro -->
    <form action="nacionalidades.php" method="POST">
        <label>Nombre Nación:</label>
        <input type="text" name="NombreNacion" maxlength="25" required>
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
            <th>Nombre Nación</th>
            <th>Acciones</th>
        </tr>
        <?php
        $resultado = mysqli_query($conexion, "SELECT * FROM NACIONALIDAD");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['IdNacion'] . "</td>";
            echo "<td>" . $fila['NombreNacion'] . "</td>";
			echo "<td><a href='nacionalidades.php?formActualizar=" . $fila['IdNacion'] . "'>Actualizar</a></td>";			
            echo "<td><a href='nacionalidades.php?eliminar=" . $fila['IdNacion'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>