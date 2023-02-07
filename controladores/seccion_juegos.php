<?php
    require "../bd/bd.php";
    require "../modelos/juego.php";
    $juegos = juego::todosJuegos();
    include "../vistas/vista_seccion_juegos.php";
?>