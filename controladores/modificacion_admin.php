<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    require "../modelos/juego.php";
    require "../modelos/usuario.php";
    include "../funciones/funciones.php";

    if(isset($_POST["modificar-usuario"])){
        $usu = new usuario();
        $datos = $usu->getDatosUsuario($_POST["usuario"]);
        include "../vistas/vista_modificar_usuario.php";
    }elseif(isset($_POST["modificar-plat"])){
        $plat = new plataforma();
        $datos = $plat->getDatosPlataforma($_POST["plataforma"]);
        include "../vistas/vista_modificar_plataforma.php";
    }

    if(isset($_POST["modificacion-usuario"])){
        $nombre = $_POST["nombre"];
        $nick = $_POST["nick"];
        $nick_original = $nick;
        $pass = $_POST["pass"];
        $id = $_POST["id"];
        $pass_original = $_POST["pass-original"];
        $success;

        if($pass == ""){
            $pass = $pass_original;
        }

        if(!cadenaVacia($nombre) and !cadenaVacia($nick) and !cadenaVacia($pass)){
            $usu = new usuario();
            $usu->modificarUsuario($id, $nombre, $nick, $pass);
            $success = true;
            $datos = $usu->getDatosUsuario($id);
        }else{
            $success = false;
            $datos = $usu->getDatosUsuario($id);
        }
        
        include "../vistas/vista_modificar_usuario.php";
    }
    elseif(isset($_POST["modificacion-plat"])){
        $nombre = $_POST["nombre"];
        $foto = $_FILES["logo"]["name"];
        $logo_original = $_POST["logo-original"];
        $id = $_POST["id"];
        $success;
        // echo $foto;
        if(!cadenaVacia(($nombre))){
            if($foto == ""){
                $foto = $logo_original;
            }else{
                $extension_foto = $_FILES["logo"]["type"];
                $tamanio_foto = $_FILES["logo"]["size"];
                $ruta_original = $_FILES["logo"]["tmp_name"];
                if(comprobarExtension($extension_foto) and comprobarTamanio($tamanio_foto)){
                    $nuevo_nombre;
                    switch($extension_foto){
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
            }
            $plat = new plataforma();
            $plat->modificarPlataforma($id, $nombre, $foto);
            $success = true;

        }else{
            $success = false;
        }
        $datos = $plat->getDatosPlataforma($id);
        include "../vistas/vista_modificar_plataforma.php";
        
    }
?>