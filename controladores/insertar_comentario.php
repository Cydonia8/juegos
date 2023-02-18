<?php
    require_once "../bd/bd.php";
    require_once "../modelos/comentario.php";
    require_once "../modelos/juego.php";
    require_once "../modelos/usuario.php";
    if(isset($_POST["enviar"])){
        $comentario = new comentario();
        $usu = new usuario();
        $juego = new juego();
        $id = $usu->sacarIDUsuario($_SESSION["user"]);
        $comprobante = $comentario->comprobarComentarioExiste($_POST["juego"], $id);
        if($comprobante == 0){
            $fecha = date('Y-m-d');
            $nuevo = $comentario->insertarComentario($id, $_POST["juego"], $fecha, $_POST["comentario"]);
            $error = false;
        }else{
            $error = true;
        }
        
        $id_juego = $_POST["juego"];
        $datos_recarga = $juego->datosRecargaJuego($_POST["juego"]);
        $datos = $juego->datosJuego($_POST["juego"]);
        $lanzamientos = $juego->lanzamientosJuego($datos_recarga[0]["juego"]);
        
        $comentarios = $comentario->comentariosJuego($id_juego, $datos_recarga[0]["plataforma"]);
   
        include "../vistas/vista_ver_mas_juego.php";
    }else{
        header("location:../index.php");
    }
?>