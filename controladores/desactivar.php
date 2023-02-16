<?php
    require_once "../bd/bd.php";
    require_once "../modelos/plataforma.php";
    require_once "../modelos/usuario.php";
    require_once "../modelos/juego.php";
    $p = new plataforma();
    $usu = new usuario();
    $j = new juego();
    if(isset($_POST["desactivar-usuario"])){

        $usu->desactivarUsuario($_POST["id"]);
        header("location:seccion_usuarios.php");

    }elseif(isset($_POST["desactivar-juego"])){

        $id = $_POST["id"];
        $j->desactivarJuego($id);
        header("location:juegos_admin.php");

    }elseif(isset($_POST["desactivar-plataforma"])){
        
        $id = $_POST["id"];
        $p->desactivarPlataforma($id);
        header("location:plataformas_admin.php");

    }elseif(isset($_POST["activar-usuario"])){

        $usu->activarUsuario($_POST["id"]);
        header("location:seccion_usuarios.php");
    }
    elseif(isset($_POST["activar-juego"])){

        $j->activarJuego($_POST["id"]);
        header("location:juegos_admin.php");

    }elseif(isset($_POST["activar-plataforma"])){
        
        $id = $_POST["id"];
        $p->activarPlataforma($id);
        header("location:plataformas_admin.php");
    }
    
?>