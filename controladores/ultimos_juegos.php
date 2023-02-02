<?php
    require_once "bd/bd.php";
    require_once "modelos/juego.php";
    $j = new juego();
    $datos = $j->ultimosJuegosPS5();
    $datos_switch = $j->ultimosJuegosSwitch();
    include "vistas/recientes.php";
?>