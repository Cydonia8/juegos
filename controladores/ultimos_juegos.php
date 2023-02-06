<?php
    // require_once "../bd/bd.php";
    require_once "modelos/juego.php";
    $j = new juego();
    $datos_ps5 = $j->ultimosJuegos("PlayStation 5");
    $datos_switch = $j->ultimosJuegos("Nintendo Switch");
    $datos_xbox = $j->ultimosJuegos("Xbox Series X");
    $datos_ps2 = $j->ultimosJuegos("PlayStation 2");
    include "vistas/recientes.php";
?>