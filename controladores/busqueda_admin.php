<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    require_once "../modelos/juego.php";
    require_once "../modelos/usuario.php";

    if(isset($_POST["buscar-plat"])){
        $plat = new plataforma();
        $resultados = $plat->buscarPlataforma($_POST["nombre"]);
        include "../vistas/vista_plataformas_admin.php";
    }elseif(isset($_POST["buscar-usuario"])){
        $user = new usuario();
        $resultados = $user->buscarUsuario($_POST["nombre"]);
        include "../vistas/vista_seccion_usuarios.php";
    }elseif(isset($_POST["buscar-juego"])){
        $juego = new juego();
        $resultados = $juego->buscarJuego($_POST["nombre"]);
        include "../vistas/vista_juegos_admin.php";
    }else{
        header("location:../index.php");
    }
?>

