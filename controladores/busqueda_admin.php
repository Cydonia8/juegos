<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    require "../modelos/juego.php";
    require "../modelos/usuario.php";

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
    }
?>

