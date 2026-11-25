<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Repaso 1</title>
</head>
<body>
    <script src="1.js" defer></script>

    <!--Método con POST-->

    <?php
        $id = 33;
        $id2 = 44;

        if(isset($_POST["eliminar_numero"])&&!empty($_POST["eliminar_numero"])){
            echo '<p class="texto">Se ha borrado el número ('.$_POST["eliminar_numero"].')</p>';

            $_POST["eliminar_numero"] = "";
        }else{
            echo '<p class="texto">Número a mostrar: '.$id.'</p>';
        }
    ?>
    <form id="eliminar" action="1.php" method="POST">
        <input type="hidden" name="eliminar_numero" value="<?= $id ?>">
        <button type="submit">Eliminar número</button>
    </form>

    <!--Método con GET-->

    <button class="eliminar" data-id="<?=$id?>">Eliminar(<?=$id?>)</button>
    <button class="eliminar" data-id="<?=$id2?>">Eliminar(<?=$id2?>)</button>

    <?php
        if(isset($_GET["eliminar_numero"])&&!empty($_GET["eliminar_numero"])){
            echo "<p class='texto'>Este es el número a eliminar: ".$_GET["eliminar_numero"]."</p>";
        }
    ?>

</body>
</html>