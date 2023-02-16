<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";
    require "../modelos/usuario.php";
    require "../modelos/juego.php";
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