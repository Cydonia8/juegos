<?php
    // session_start();
    require_once "../bd/bd.php";
    require_once "../modelos/acceso.php";
    if(isset($_POST["enviar"])){
        $nick = $_POST["user"];
        $pass = md5(md5($_POST["pass"]));
        $acceso = new acceso($nick, $pass);
        $comprobante = $acceso->comprobarAcceso($nick, $pass);
        if($comprobante == 1){
            $_SESSION["user"] = $nick;
            header("location:../index.php");
        }else{
            include "../vistas/vista_acceder.php";
        }
    }
    // include "../vistas/vista_acceder.php";
?>