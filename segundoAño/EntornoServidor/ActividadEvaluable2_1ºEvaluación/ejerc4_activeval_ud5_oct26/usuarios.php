<?php
include 'conexion.php';

if (isset($_POST['guardar'])) {
    $nombre = $_POST['Nombre'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $sexo = $_POST['Sexo'];
    $fechanac = $_POST['FechaNac'];
    $idnacion = $_POST['IdNacion'];
    $idsuscrip = $_POST['IdSuscrip'];

    $sql = "INSERT INTO USUARIO (Nombre, Username, Password, Email, Sexo, FechaNac, IdNacion, IdSuscrip) 
            VALUES ('$nombre', '$username', '$password', '$email', '$sexo', '$fechanac', $idnacion, $idsuscrip)";
    mysqli_query($conexion, $sql);
    header("Location: usuarios.php");
    exit();
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($conexion, "DELETE FROM USUARIO WHERE IdUser = $id");
    header("Location: usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Usuarios</title>
</head>
<body>
    <a href="index.php">← Volver al Inicio</a>
    <h2>Gestión de Usuarios</h2>

    <form action="usuarios.php" method="POST">
        <label>Nombre:</label> <input type="text" name="Nombre" maxlength="15" required><br>
        <label>Username:</label> <input type="text" name="Username" maxlength="12" required><br>
        <label>Password:</label> <input type="password" name="Password" maxlength="12" required><br>
        <label>Email:</label> <input type="email" name="Email" maxlength="40" required><br>
        <label>Sexo:</label> 
        <select name="Sexo">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Otro">Otro</option>
        </select><br>
        <label>Fecha Nacimiento:</label> <input type="date" name="FechaNac" required><br>
        
        <label>Nacionalidad:</label>
        <select name="IdNacion">
            <?php
            $resNac = mysqli_query($conexion, "SELECT * FROM NACIONALIDAD");
            while($n = mysqli_fetch_assoc($resNac)) {
                echo "<option value='".$n['IdNacion']."'>".$n['NombreNacion']."</option>";
            }
            ?>
        </select><br>

        <label>Suscripción:</label>
        <select name="IdSuscrip">
            <?php
            $resSus = mysqli_query($conexion, "SELECT * FROM SUSCRIPCION");
            while($s = mysqli_fetch_assoc($resSus)) {
                echo "<option value='".$s['IdSuscrip']."'>".$s['NombreSuscrip']."</option>";
            }
            ?>
        </select><br>

        <button type="submit" name="guardar">Registrar Usuario</button>
    </form>

    <hr>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Username</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Acciones</th>
        </tr>
        <?php
        $resultado = mysqli_query($conexion, "SELECT * FROM USUARIO");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['IdUser'] . "</td>";
            echo "<td>" . $fila['Nombre'] . "</td>";
            echo "<td>" . $fila['Username'] . "</td>";
            echo "<td>" . $fila['Email'] . "</td>";
            echo "<td>" . $fila['Sexo'] . "</td>";
            echo "<td><a href='usuarios.php?eliminar=" . $fila['IdUser'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>