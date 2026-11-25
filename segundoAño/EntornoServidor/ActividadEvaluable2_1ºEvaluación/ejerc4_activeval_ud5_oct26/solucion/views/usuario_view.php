<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($usuarios as $usu): ?>
        <tr>
            <td><?php echo $usu->getNombre(); ?></td>
            <td><?php echo $usu->getUsername(); ?></td>
            <td><?php echo $usu->msg_general("Conectado correctamente"); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>