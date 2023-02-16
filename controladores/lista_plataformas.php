<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    $plat = new plataforma();
    $datos = $plat->getNombrePlataformas();
    include "../vistas/vista_insertar_juego.php";
?>