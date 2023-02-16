<?php
    // require_once "../bd/bd.php";
    require_once "modelos/juego.php";
    require "modelos/plataforma.php";
    // $j = new juego();
    $plat = new plataforma();
    $plataformas = $plat->getPlataformas();
    $datos = array();
    $i=0;
    foreach($plataformas as $plataforma){
        $datos[$i] = juego::ultimosJuegos($plataforma);
        $i++;
    }
    include "vistas/recientes.php";
?>