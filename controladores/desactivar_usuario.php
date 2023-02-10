<?php
    require "../bd/bd.php";
    require "../modelos/usuario.php";
    if(isset($_POST["desactivar"])){
        $usu = new usuario();
        $usu->id=$_POST["id"];
        $usu->desactivarUsuario($_POST["id"]);
    }
    include "../vistas/vista_seccion_usuarios.php";
?>