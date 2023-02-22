<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    $plat = new plataforma();
    $datos = $plat->sacarPlataformasAdmin();
    include "../vistas/vista_plataformas_admin.php";
?>