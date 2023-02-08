<?php
    class plataforma{
        private $id;
        private $nombre;
        private $activo;
        private $logotipo;
        private $bd;

        public function __construct(){
            $this->id = 0;
            $this->nombre = '';
            $this->activo = 0;
            $this->logotipo = '';
            $this->bd=conectar::conectarBD();
        }

        public function __get($atr){
            return $this->$atr;
        }
        public function __set($atr, $valor){
            $this->$atr=$valor;
        }

        public static function sacarPlataformas(){
            $conexion = conectar::conectarBD();
            $plataformas = $conexion->query("select logotipo, id from plataformas");
            $i = 0;
            while($fila = $plataformas->fetch_array(MYSQLI_ASSOC)){
                $plataforma[$i]["logo"] = $fila["logotipo"];
                $plataforma[$i]["id"] = $fila["id"];
                $i++;
            }
            $conexion->close();
            return $plataforma;
        }
    }
?>