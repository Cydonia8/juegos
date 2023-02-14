<?php
    require "../bd/bd.php";
    require "../modelos/usuario.php";
    require "../modelos/juego.php";
    if(isset($_POST["desactivar-usuario"])){
        $usu = new usuario();
        $usu->desactivarUsuario($_POST["id"]);
        header("location:seccion_usuarios.php");
    }elseif(isset($_POST["desactivar-juego"])){
        $j = new juego();
        $id = $_POST["id"];
        $j->desactivarJuego($id);
        header("location:juegos_admin.php");
    }
    
?>