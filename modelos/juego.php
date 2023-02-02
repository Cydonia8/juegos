<?php 

    class juego{
        private $id;
        private $nombre;
        private $descripcion;
        private $plataforma;
        private $caratula;
        private $fecha_lanzamiento;
        private $activo;

        public function __construct(){
            $this->id=0;
            $this->nombre='';
            $this->descripcion='';
            $this->plataforma=0;
            $this->caratula='';
            $this->fecha_lanzamiento = '';
            $this->activo=0;
        }

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr, $valor){
            $this->$attr=$valor;
        }

        public function ultimosJuegosPS5(){
            $conexion = conectar::conectarBD();
            $recientes = $conexion->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and plataforma = 1 order by fecha_lanzamiento desc limit 4");
            $i = 0;
            $juegos=array();
            while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
                $juegos[$i]["juego"] = $fila["juego"];
                $juegos[$i]["plataforma"] = $fila["plat"];
                $juegos[$i]["caratula"] = $fila["caratula"];
                $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
                $i++;
            }
            $conexion->close();
            return $juegos;
        }

        public function ultimosJuegosSwitch(){
            $conexion = conectar::conectarBD();
            $recientes = $conexion->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and plataforma = 2 order by fecha_lanzamiento desc limit 4");
            $i = 0;
            while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
                $juegos[$i]["juego"] = $fila["juego"];
                $juegos[$i]["plataforma"] = $fila["plat"];
                $juegos[$i]["caratula"] = $fila["caratula"];
                $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
                $i++;
            }
            $conexion->close();
            return $juegos;
        }


    }
?>