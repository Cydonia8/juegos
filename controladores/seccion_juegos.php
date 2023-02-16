<?php
    require_once "../bd/bd.php";
    require_once "../modelos/juego.php";
    $juegos = juego::todosJuegos();
    include "../vistas/vista_seccion_juegos.php";
?>