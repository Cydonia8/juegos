<?php
    require_once "modelos/comentario.php";

    $com = new comentario();
    $ultimos_comentarios = $com->ultimosComentarios();
    include "vistas/vista_ultimos_comentarios.php";
?>