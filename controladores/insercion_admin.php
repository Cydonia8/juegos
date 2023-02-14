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
        $nombre = $_POST["nombre"];
        $ruta_original = $_FILES["logo"]["tmp_name"];
        $tamanio = $_FILES["logo"]["size"];
        $extension = $_FILES["logo"]["type"];
        $success;

        if(!cadenaVacia($nombre)){
            if(comprobarTamanio($tamanio) and comprobarExtension($extension)){
                $nuevo_nombre;
                switch($extension){
                    case "image/jpeg":
                        $nuevo_nombre = $nombre.".jpeg";
                        break;
                    case "image/png":
                        $nuevo_nombre = $nombre.".png";
                        break;
                }
                $foto = "../media/img_plataformas/".$nuevo_nombre;
                move_uploaded_file($ruta_original, $foto);
            }
            $plat = new plataforma();
            $plat->insertarPlataforma($nombre, $foto);
            $success = true;
        }else{
            $success = false;
        }
    }
?>