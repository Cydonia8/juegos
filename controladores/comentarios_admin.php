<?php
    require_once "../bd/bd.php";
    require_once "../modelos/comentario.php";
    $comentario = new comentario();
    $comentarios = $comentario->getComentarios();
    include "../vistas/vista_comentarios_admin.php";
?>