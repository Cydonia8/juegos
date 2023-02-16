<?php
    require_once "../bd/bd.php";
    require_once "../modelos/usuario.php";
    $usu = new usuario();
    $datos = $usu->getUsuarios();
    include "../vistas/vista_seccion_usuarios.php";
?>