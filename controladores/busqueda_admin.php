<?php
    require "../bd/bd.php";
    require "../modelos/plataforma.php";

    if(isset($_POST["buscar-plat"])){
        $plat = new plataforma();
        $resultados = $plat->buscarPlataforma($_POST["nombre"]);
        include "../vistas/vista_plataformas_admin.php";
    }
?>

