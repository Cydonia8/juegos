<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    $plat = new plataforma();
    $datos = $plat->sacarPlataformas();
    include "../vistas/vista_plataformas_admin.php";
?>