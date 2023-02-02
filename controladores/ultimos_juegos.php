<?php
    // require_once "../bd/bd.php";
    require_once "modelos/juego.php";
    $j = new juego();
    $datos_ps5 = $j->ultimosJuegosPS5();
    $datos_switch = $j->ultimosJuegosSwitch();
    $datos_xbox = $j->ultimosJuegosXBOX();
    $datos_ps2 = $j->ultimosJuegosPS2();
    include "vistas/recientes.php";
?>