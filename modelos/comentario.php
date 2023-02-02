<?php
    class comentario{
        private $usuario;
        private $juego;
        private $fecha;
        private $texto;
        private $bd;

        public function __construct(){
            $this->usuario="";
            $this->juego=0;
            $this->fecha="";
            $this->texto="";
            $this->bd=conectar::conectarBD();
        }
    }
?>