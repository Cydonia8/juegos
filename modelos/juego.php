<?php 

    class juego{
        private $id;
        private $nombre;
        private $descripcion;
        private $plataforma;
        private $caratula;
        private $fecha_lanzamiento;
        private $activo;
        private $bd;

        public function __construct(){
            $this->id=0;
            $this->nombre='';
            $this->descripcion='';
            $this->plataforma=0;
            $this->caratula='';
            $this->fecha_lanzamiento = '';
            $this->activo=0;
            $this->bd=conectar::conectarBD();
        }

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr, $valor){
            $this->$attr=$valor;
        }

        // public function ultimosJuegosPS5(){
        //     // $conexion = conectar::conectarBD();
        //     $recientes = $this->bd->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and plataforma = 1 and j.activo = 1 order by fecha_lanzamiento desc limit 4");
        //     $i = 0;
        //     $juegos=array();
        //     while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
        //         $juegos[$i]["juego"] = $fila["juego"];
        //         $juegos[$i]["plataforma"] = $fila["plat"];
        //         $juegos[$i]["caratula"] = $fila["caratula"];
        //         $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
        //         $i++;
        //     }
            
        //     return $juegos;
        // }

        public static function ultimosJuegos($plat){
            $conexion = conectar::conectarBD();
            $recientes = $conexion->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and p.nombre = '$plat' and j.activo = 1 order by fecha_lanzamiento desc limit 4");
            $i = 0;
            $juegos=array();
            while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
                $juegos[$i]["juego"] = $fila["juego"];
                $juegos[$i]["plataforma"] = $fila["plat"];
                $juegos[$i]["caratula"] = $fila["caratula"];
                $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
                $i++;
            }
            
            return $juegos;
        }

        public static function todosJuegos(){
            $conexion = conectar::conectarBD();
            $todos = $conexion->query("select j.nombre juego, j.id id_juego, caratula, p.nombre plataforma from juegos j, plataformas p where j.plataforma = p.id order by p.nombre asc");
            $i = 0;
            while($fila=$todos->fetch_array(MYSQLI_ASSOC)){
                $juegos[$i]["juego"] = $fila["juego"];
                $juegos[$i]["id"] = $fila["id_juego"];
                $juegos[$i]["foto"] = $fila["caratula"];
                $juegos[$i]["plataforma"] = $fila["plataforma"];
                $i++;
            }

            return $juegos;
            $conexion->close();
        }

        // public function ultimosJuegosSwitch(){
        //     // $conexion = conectar::conectarBD();
        //     $recientes = $this->bd->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and plataforma = 2 and j.activo = 1 order by fecha_lanzamiento desc limit 4");
        //     $i = 0;
        //     while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
        //         $juegos[$i]["juego"] = $fila["juego"];
        //         $juegos[$i]["plataforma"] = $fila["plat"];
        //         $juegos[$i]["caratula"] = $fila["caratula"];
        //         $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
        //         $i++;
        //     }
        //     return $juegos;
        // }

        // public function ultimosJuegosXBOX(){
        //     $recientes = $this->bd->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and plataforma = 3 and j.activo = 1 order by fecha_lanzamiento desc limit 4");
        //     $i = 0;
        //     while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
        //         $juegos[$i]["juego"] = $fila["juego"];
        //         $juegos[$i]["plataforma"] = $fila["plat"];
        //         $juegos[$i]["caratula"] = $fila["caratula"];
        //         $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
        //         $i++;
        //     }
        //     return $juegos;
        // }

        // public function ultimosJuegosPS2(){
        //     $recientes = $this->bd->query("select j.nombre juego, p.nombre plat, caratula, fecha_lanzamiento from juegos j, plataformas p where p.id = j.plataforma and plataforma = 4 and j.activo = 1 order by fecha_lanzamiento desc limit 4");
        //     $i = 0;
        //     while($fila=$recientes->fetch_array(MYSQLI_ASSOC)){
        //         $juegos[$i]["juego"] = $fila["juego"];
        //         $juegos[$i]["plataforma"] = $fila["plat"];
        //         $juegos[$i]["caratula"] = $fila["caratula"];
        //         $juegos[$i]["fecha"] = $fila["fecha_lanzamiento"];
        //         $i++;
        //     }
        //     return $juegos;
        // }
        

        


    }
?>