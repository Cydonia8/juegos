<?php
    require "../bd/bd.php";
    require "../modelos/usuario.php";
    $usu = new usuario();
    $datos = $usu->getUsuarios();
    include "../vistas/vista_seccion_usuarios.php";
?>