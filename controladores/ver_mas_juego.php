<?php
require_once "../bd/bd.php";
require_once "../modelos/juego.php";
require_once "../modelos/comentario.php";
    if(isset($_POST["enviar"])){
        
        $juego = new juego();
        $datos = $juego->datosJuego($_POST["id"]);
        $lanzamientos = $juego->lanzamientosJuego($_POST["nombre"]);
        if(isset($_SESSION["user"])){
            $comentario = new comentario();
            $comentarios = $comentario->comentariosJuego($_POST["id"], $_POST["plat"]);
        }
        include "../vistas/vista_ver_mas_juego.php";
    }else{
        header("location:../index.php");
    }
    
?>