<?php
    require_once "../modelos/juego.php";
    $j = new juego();
    $datos = $j->ultimosJuegosPS5();
    // $datos_switch = $juego->ultimosJuegosSwitch();
    require_once "../vistas/recientes.php";
?>