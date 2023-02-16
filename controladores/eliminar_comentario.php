<?php
    require_once "../bd/bd.php";
    require_once "../modelos/comentario.php";
    if(isset($_POST["enviar"])){
        $com = new comentario();

        $datos_borrar = $com->getDatosBorrar($_POST["texto"], $_POST["juego"], $_POST["usuario"]);
        $eliminar = $com->eliminarComentario($_POST["texto"], $datos_borrar[0]["juego"], $datos_borrar[0]["usuario"]);
        header("location:comentarios_admin.php");
    }
?>