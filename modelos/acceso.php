<?php
    class acceso{
        private $user;
        private $pass;

        public function __construct(){
            $this->user='';
            $this->pass='';
        }

        public function __get($atr){
            return $this->$atr;
        }
        public function __set($atr, $valor){
            $this->$atr=$valor;
        }

        public function comprobarAcceso($user, $pass){
            $conexion = conectar::conectarBD();
            $acceso = $conexion->prepare("select count(*) from usuarios where nick = ? and pass = ?");
            $acceso->bind_param('ss', $user, $pass);
            $acceso->bind_result($comprobante);
            $acceso->execute();
            $acceso->fetch();
            $acceso->close();
            $conexion->close();

            return $comprobante;
        }
    }
?>