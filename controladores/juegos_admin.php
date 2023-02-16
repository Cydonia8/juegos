<?php
    require_once "../bd/bd.php";
    require_once "../modelos/juego.php";
    $j = new juego();
    $datos = $j->getJuegos();
    include "../vistas/vista_juegos_admin.php";
?>