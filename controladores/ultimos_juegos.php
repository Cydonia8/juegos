<?php
    // require_once "../bd/bd.php";
    require_once "modelos/juego.php";
    // $j = new juego();
    $datos_ps5 = juego::ultimosJuegos("PlayStation 5");
    $datos_switch = juego::ultimosJuegos("Nintendo Switch");
    $datos_xbox = juego::ultimosJuegos("Xbox Series X");
    $datos_ps2 = juego::ultimosJuegos("PlayStation 2");
    include "vistas/recientes.php";
?>