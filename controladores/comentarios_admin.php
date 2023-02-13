<?php
    require "../bd/bd.php";
    require "../modelos/comentario.php";
    $comentario = new comentario();
    $comentarios = $comentario->getComentarios();
    include "../vistas/vista_comentarios_admin.php";
?>