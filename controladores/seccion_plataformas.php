<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    $plataformas = plataforma::sacarPlataformas();
    include "../vistas/vista_seccion_plataformas.php";
?>