<?php
include 'conexion.php';

// Procesar inserción
if (isset($_POST['guardar'])) {
    $nombrePag = $_POST['NombrePagina'];
	$url = $_POST['UrlPagina'];
    $sql = "INSERT INTO PAGINA (NombrePag, Url) VALUES ('$nombrePag', '$url')";
    mysqli_query($conexion, $sql);
    header("Location: paginas.php");
    exit();
}

// Procesar eliminación
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM PAGINA WHERE IdPag = $id";
    mysqli_query($conexion, $sql);
    header("Location: paginas.php");
    exit();
}
	
// Procesar actualización
if (isset($_POST['actualizar'])) {
    $id = $_POST['actualizar'];
    $nombrePag = $_POST['NombrePagina'];	
	$url = $_POST['UrlPagina'];	
    $sql = "UPDATE PAGINA SET NombrePag = '$nombrePag', Url = '$url' WHERE IdPag = "  .$_POST['idActualiz'];
   //echo "$sql <br><br>";
    mysqli_query($conexion, $sql);
    header("Location: paginas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Pagina</title>
</head>
<body>
    <a href="index.php">← Volver al Inicio</a>
    <h2>Gestión de Páginas</h2>
    
	<?php
	$idPag = "-1";		
	$nomPag = "--";
	$urlPag = "--";	
	
	if (isset($_GET['formActualizar'])){

		$sqlSelectWhere = "SELECT * FROM PAGINA WHERE IdPag=" .$_GET['formActualizar']. "";
		//echo "$sqlSelectWhere <br>";
		$resul = mysqli_query($conexion, $sqlSelectWhere);
        while ($regist = mysqli_fetch_assoc($resul)) {
            $idPag = $regist['IdPag']; 
			$nomPag = $regist['NombrePag'];
			$urlPag = $regist['Url'];			
		}
	?>	
	<!-- Formulario de Modificación -->
	<form action="paginas.php" method="POST">
	    <label>Nombre Página:</label>
        <input type="text" name="NombrePagina" value="<?php echo $nomPag;?>" maxlength="25" required>
		&nbsp;<?&php echo "&nbsp;(id: $idPag)"; ?> <br>
		<label>URL Página:</label>		
        <input type="text" name="UrlPagina" value="<?php echo $urlPag;?>" maxlength="60" required>				
		<input type="hidden" name="idActualiz" value="<?php echo $idPag;?>"> <br>
        <button type="submit" name="actualizar">Modificar</button>
    </form>
	<?php
	} else {
	   //if (isset($_GET['actualizar'])){
	?>
    <!-- Formulario de Registro -->
    <form action="paginas.php" method="POST">
        <label>Nombre Página:</label>
        <input type="text" name="NombrePagina" maxlength="25" required> <br>
		<label>URL Página:</label>		
        <input type="text" name="UrlPagina" maxlength="60" required> <br>		
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
            <th>Nombre Página</th>
            <th>URL</th>			
            <th>Acciones</th>
        </tr>
        <?php
        $resultado = mysqli_query($conexion, "SELECT * FROM PAGINA");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['IdPag'] . "</td>";
            echo "<td>" . $fila['NombrePag'] . "</td>";
            echo "<td>" . $fila['Url'] . "</td>";			
			echo "<td><a href='paginas.php?formActualizar=" . $fila['IdPag'] . "'>Actualizar</a></td>";			
            echo "<td><a href='paginas.php?eliminar=" . $fila['IdPag'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>