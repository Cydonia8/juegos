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
            $todos = $conexion->query("select p.id id_plat, j.nombre juego, j.id id_juego, caratula, p.nombre plataforma from juegos j, plataformas p where j.plataforma = p.id order by p.nombre asc");
            $i = 0;
            while($fila=$todos->fetch_array(MYSQLI_ASSOC)){
                $juegos[$i]["juego"] = $fila["juego"];
                $juegos[$i]["id"] = $fila["id_juego"];
                $juegos[$i]["foto"] = $fila["caratula"];
                $juegos[$i]["plataforma"] = $fila["plataforma"];
                $juegos[$i]["id_plat"] = $fila["id_plat"];
                $i++;
            }

            return $juegos;
            $conexion->close();
        }

        public function datosJuego($id){
            $conexion = conectar::conectarBD();
            $datos = $conexion->query("select id, descripcion, caratula, nombre from juegos where id = '$id'");
            $fila = $datos->fetch_array(MYSQLI_ASSOC);
            $datos_juego[0]["nombre"] = $fila["nombre"];
            $datos_juego[0]["foto"] = $fila["caratula"];
            $datos_juego[0]["descripcion"] = $fila["descripcion"];
            $datos_juego[0]["id"] = $fila["id"];
            $conexion->close();
            return $datos_juego;
        }

        public function datosRecargaJuego($id){
            $conexion = conectar::conectarBD();
            $datos = $conexion->query("select j.nombre juego, p.id plat from juegos j, plataformas p where p.id = j.plataforma and j.id = '$id'");
            $fila = $datos->fetch_array(MYSQLI_ASSOC);
            $datos_j[0]["juego"] = $fila["juego"];
            $datos_j[0]["plataforma"] = $fila["plat"];
            $conexion->close();
            return $datos_j;
        }
        public function lanzamientosJuego($nombre){
            $conexion = conectar::conectarBD();
            $lanzamientos = $conexion->prepare("select fecha_lanzamiento, p.nombre plat from juegos j, plataformas p where j.plataforma = p.id and j.nombre = ? order by fecha_lanzamiento desc");
            $lanzamientos->bind_param('s', $nombre);
            $lanzamientos->bind_result($fecha, $plataforma);
            $lanzamientos->execute();
            $i=0;
            while($lanzamientos->fetch()){
                $lanzamiento[$i]["fecha"] = $fecha;
                $lanzamiento[$i]["plataforma"] = $plataforma;
                $i++;
            }
            $conexion->close();
            return $lanzamiento;
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