<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    $plat = new plataforma();
    $datos = $plat->getNombrePlataformas();
    include "../vistas/vista_insertar_juego.php";
?>