<?php
    class conectar{
        public static function conectarBD(){
            $conexion = new mysqli('localhost', 'root', '', "tienda_juegos");
            $conexion->set_charset('utf8');
            return $conexion;
        }
    }
?>