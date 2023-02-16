<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    $plat = new plataforma();
    $datos = $plat->sacarPlataformas();
    include "../vistas/vista_plataformas_admin.php";
?>