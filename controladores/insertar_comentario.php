<?php
    require "../bd/bd.php";
    require "../modelos/comentario.php";
    require_once "../modelos/juego.php";
    require "../modelos/usuario.php";
    if(isset($_POST["enviar"])){
        $comentario = new comentario();
        $usu = new usuario();
        $juego = new juego();

        $id = $usu->sacarIDUsuario($_SESSION["user"]);
        $fecha = date('Y-m-d');
        $nuevo = $comentario->insertarComentario($id, $_POST["juego"], $fecha, $_POST["comentario"]);
        
        $id_juego = $_POST["juego"];
        $datos_recarga = $juego->datosRecargaJuego($_POST["juego"]);
        $datos = $juego->datosJuego($_POST["juego"]);
        $lanzamientos = $juego->lanzamientosJuego($datos_recarga[0]["juego"]);
        
        $comentarios = $comentario->comentariosJuego($id_juego, $datos_recarga[0]["plataforma"]);
   
        include "../vistas/vista_ver_mas_juego.php";
    }
?>