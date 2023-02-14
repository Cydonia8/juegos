<?php
    require "../bd/bd.php";
    require "../modelos/juego.php";
    $j = new juego();
    $datos = $j->getJuegos();
    include "../vistas/vista_juegos_admin.php";
?>