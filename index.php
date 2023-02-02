<?php
    session_start();
    require_once "funciones.php";
    include "bd/bd.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
        menuEstandar();
        // include "vistas/recientes.php";
        // include "controladores/ultimos_juegos.php";
        
    ?>
    <main>
        <section class="ultimos-container">
            <?php
                include "controladores/ultimos_juegos.php";
            ?>
        </section>
    </main>
</body>
</html>