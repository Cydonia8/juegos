<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    require_once "../modelos/juego.php";
    require_once "../modelos/usuario.php";
    include "../funciones/funciones.php";
    $usu = new usuario();
    $plat = new plataforma();
    $j = new juego();

    if(isset($_POST["modificar-usuario"])){
        $datos = $usu->getDatosUsuario($_POST["usuario"]);
        include "../vistas/vista_modificar_usuario.php";
    }elseif(isset($_POST["modificar-plat"])){
        $datos = $plat->getDatosPlataforma($_POST["plataforma"]);
        include "../vistas/vista_modificar_plataforma.php";
    }elseif(isset($_POST["modificar-juego"])){
        $datos = $j->getDatosJuego($_POST["juego"]);
        $plats = $plat->getNombrePlataformas();
        include "../vistas/vista_modificar_juego.php";
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
        $success = false;
        $foto_error = false;
        // echo $foto;
        if(!cadenaVacia(($nombre))){
            if($foto == ""){
                $foto = $logo_original;
                $success = true;
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
                    $success = true;
                }else{
                    $foto_error = true;
                }
            }       
        }
        if($success){
            $plat->modificarPlataforma($id, $nombre, $foto);
        }
        $datos = $plat->getDatosPlataforma($id);
        include "../vistas/vista_modificar_plataforma.php";
        
    }elseif(isset($_POST["modificacion-juego"])){
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $caratula = $_FILES["foto"]["name"];
        $caratula_original = $_POST["foto-original"];
        $plataforma = $_POST["plataforma"];
        $fecha = $_POST["fecha"];
        $id = $_POST["id"];
        $precio =$_POST["precio"];
        $success = false;
        $foto_error = false;

        
        if(!cadenaVacia($nombre) and !cadenaVacia($descripcion)){
            if($caratula == ""){
                $caratula = $caratula_original; 
                $success = true;
            }else{
                
                $tamanio_foto = $_FILES["foto"]["size"];
                $extension_foto = $_FILES["foto"]["type"];
                $ruta_original = $_FILES["foto"]["tmp_name"];
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
                    $caratula = "../media/img_juegos/".$nuevo_nombre;
                    move_uploaded_file($ruta_original, $caratula);
                    $success = true;
                    
                }else{
                    $foto_error = true;
                }
            }
        }
        if($success){
            $j->modificarJuego($id, $nombre, $descripcion, $plataforma, $caratula, $fecha, $precio);
        }
        $datos = $j->getDatosJuego($id);
        $plats = $plat->getNombrePlataformas();
        include "../vistas/vista_modificar_juego.php";

    }
?>