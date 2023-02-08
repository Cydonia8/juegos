<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    $plataformas = plataforma::sacarPlataformas();
    include "../vistas/vista_seccion_plataformas.php";
?>