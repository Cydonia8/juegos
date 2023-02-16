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
    // foreach($datos as $matriz){
    //     foreach($matriz as $array){
    //         echo "<h2>$array[juego]</h2>";
    //         echo "<h2>$array[plataforma]</h2>";
    //         echo "<h2>$array[caratula]</h2>";
    //         echo "<h2>$array[fecha]</h2>";
    //         if(next($array) == false){
    //             echo "<h3>zi</h3>";
    //         }


    //     }
    // }
    

    // $datos_ps5 = juego::ultimosJuegos("PlayStation 5");
    // $datos_switch = juego::ultimosJuegos("Nintendo Switch");
    // $datos_xbox = juego::ultimosJuegos("Xbox Series X");
    // $datos_ps2 = juego::ultimosJuegos("PlayStation 2");
    include "vistas/recientes.php";
?>