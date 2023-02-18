<?php
     require_once "../bd/bd.php";
     require_once "../modelos/plataforma.php";
     if(isset($_POST["enviar"])){
        $plat = new plataforma();
        $plat->nombre=$_POST["nombre"];
        $juegos = $plat->juegosPlataforma($_POST["id"]);
        include "../vistas/vista_ver_plataforma.php";
     }else{
      header("location:../index.php");
  }
     
?>