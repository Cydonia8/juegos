<?php
    require "modelos/comentario.php";

    $com = new comentario();
    $ultimos_comentarios = $com->ultimosComentarios();
    include "vistas/vista_ultimos_comentarios.php";
?>