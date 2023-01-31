<?php
    class conectar{
        public static function conectarBD($bdname){
            $conexion = new mysqli('localhost', 'root', '', $bdname);
            $conexion->set_charset('utf8');
            return $conexion;
        }
    }
?>