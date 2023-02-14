<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    require "../modelos/juego.php";
    require "../modelos/usuario.php";
    require "../funciones/funciones.php";

    if(isset($_POST["insertar-usuario"])){
        $nombre = $_POST["nombre"];
        $nick = $_POST["nick"];
        $pass = $_POST["pass"];
        $success;

        $usu = new usuario();
        $existe = $usu->usuarioRepetido($nick);
        if($existe == 0 and(!cadenaVacia($nombre) and !cadenaVacia($nick) and !cadenaVacia($pass))){
            $pass = md5(md5($pass));
            $usu->insertarUsuario($nombre, $nick, $pass);
            $success = true;
        }else{
            $success = false;
        }
        include "../vistas/vista_insertar_usuario.php";
        
    }elseif(isset($_POST["insertar-plat"])){
        
    }
?>