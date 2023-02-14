<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    require "../modelos/juego.php";
    require "../modelos/usuario.php";

    if(isset($_POST["modificar-usuario"])){
        $usu = new usuario();
        $datos = $usu->getDatosUsuario($_POST["usuario"]);
        include "../vistas/vista_modificar_usuario.php";
    }

    if(isset($_POST["modificacion-usuario"])){
        $nombre = $_POST["nombre"];
        $nick = $_POST["nick"];
        $pass = $_POST["pass"];
        $pass_original = $_POST["pass-original"];
        $success;

        if($pass == ""){
            $pass = $pass_original;
        }

        if(!cadenaVacia($nombre) and !cadenaVacia($nick) and !cadenaVacia($pass)){
            
        }else{
            $success = false;
        }
    }
?>