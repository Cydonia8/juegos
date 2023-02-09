<?php
    if(isset($_POST["enviar"])){
        require "../bd/bd.php";
        require_once "../modelos/juego.php";
        $juego = new juego();
        $datos = $juego->datosJuego($_POST["id"]);
        $lanzamientos = $juego->lanzamientosJuego($_POST["nombre"]);
        include "../vistas/vista_ver_mas_juego.php";
    }
    
?>