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
            $todos = $conexion->query("select p.id id_plat, j.nombre juego, j.id id_juego, caratula, p.nombre plataforma from juegos j, plataformas p where j.plataforma = p.id and j.activo = 1 order by p.nombre asc");
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

        public function obtenerAutoid(){
            $conexion = conectar::conectarBD();
            $consulta_id = $conexion->prepare("select auto_increment cod from information_schema.tables where table_schema = 'tienda_juegos' and table_name = 'juegos'");
            $consulta_id->bind_result($id);
            $consulta_id->execute();
            $consulta_id->fetch();
            $consulta_id->close();
        
            return $id;
        }

        public function datosJuego($id){
            $conexion = conectar::conectarBD();
            $datos = $conexion->query("select id, descripcion, caratula, nombre, precio from juegos where id = '$id'");
            $fila = $datos->fetch_array(MYSQLI_ASSOC);
            $datos_juego[0]["nombre"] = $fila["nombre"];
            $datos_juego[0]["foto"] = $fila["caratula"];
            $datos_juego[0]["descripcion"] = $fila["descripcion"];
            $datos_juego[0]["id"] = $fila["id"];
            $datos_juego[0]["precio"] = $fila["precio"];
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
        
        public function getJuegos(){
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->query("select j.id id, j.nombre juego, descripcion, p.nombre plataforma, caratula, fecha_lanzamiento, j.activo activo, precio from juegos j, plataformas p where j.plataforma = p.id");
            $i=0;
            $resultados=array();
            while($fila = $sentencia->fetch_array(MYSQLI_ASSOC)){
                $resultados[$i]["id"] = $fila["id"];
                $resultados[$i]["nombre"] = $fila["juego"];
                $resultados[$i]["descripcion"] = $fila["descripcion"];
                $resultados[$i]["plataforma"] = $fila["plataforma"];
                $resultados[$i]["caratula"] = $fila["caratula"];
                $resultados[$i]["fecha"] = $fila["fecha_lanzamiento"];
                $resultados[$i]["activo"] = $fila["activo"];
                $resultados[$i]["precio"] = $fila["precio"];
                $i++;
            }
            $conexion->close();
            return $resultados;
        }

        public function buscarJuego($patron){
            $patron_busqueda = str_pad($patron, strlen($patron)+2, '%', STR_PAD_BOTH);
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->prepare("select j.id id, j.nombre juego, descripcion, p.nombre plataforma, caratula, fecha_lanzamiento, j.activo activo, precio from juegos j, plataformas p where j.plataforma = p.id and j.nombre like ?");
            $sentencia->bind_param('s', $patron_busqueda);
            $sentencia->bind_result($id, $nombre, $descripcion, $plataforma, $caratula, $fecha, $activo, $precio);
            $sentencia->execute();
            
            $resultados = array();
            $i=0;

            while($sentencia->fetch()){
                $resultados[$i]["id"] = $id;
                $resultados[$i]["nombre"] = $nombre;
                $resultados[$i]["descripcion"] = $descripcion;
                $resultados[$i]["plataforma"] = $plataforma;
                $resultados[$i]["caratula"] = $caratula;
                $resultados[$i]["fecha"] = $fecha;
                $resultados[$i]["activo"] = $activo;
                $resultados[$i]["precio"] = $precio;
                $i++;
            }
            $sentencia->close();
            $conexion->close();
            return $resultados;
        }
        
        public function desactivarJuego($id){
            $conexion = conectar::conectarBD();
            $desactivacion = $conexion->prepare("update juegos set activo = 0 where id = ?");
            $desactivacion->bind_param('i', $id);
            $desactivacion->execute();
            $desactivacion->close();
            $conexion->close();
        }
        public function activarJuego($id){
            $conexion = conectar::conectarBD();
            $desactivacion = $conexion->prepare("update juegos set activo = 1 where id = ?");
            $desactivacion->bind_param('i', $id);
            $desactivacion->execute();
            $desactivacion->close();
            $conexion->close();
        }

        public function insertarJuego($nombre, $descripcion, $plataforma, $caratula, $fecha, $activo,$precio){
            $conexion = conectar::conectarBD();
            $insercion = $conexion->prepare("insert into juegos values (null, ?, ?, ?, ?, ?, ?, ?)");
            $insercion->bind_param('ssissid', $nombre, $descripcion, $plataforma, $caratula, $fecha, $activo, $precio);
            $insercion->execute();
            $insercion->close();
            $conexion->close();
        }

        public function getDatosJuego($id){
            $conexion = conectar::conectarBD();
            $consulta = $conexion->query("select id, nombre, descripcion, plataforma, caratula, fecha_lanzamiento, precio from juegos where id = '$id'");
            $fila = $consulta->fetch_array(MYSQLI_ASSOC);

            $resultado[0]["id"] = $fila["id"];
            $resultado[0]["nombre"] = $fila["nombre"];
            $resultado[0]["descripcion"] = $fila["descripcion"];
            $resultado[0]["plataforma"] = $fila["plataforma"];
            $resultado[0]["caratula"] = $fila["caratula"];
            $resultado[0]["fecha"] = $fila["fecha_lanzamiento"];
            $resultado[0]["precio"] = $fila["precio"];
            
            $conexion->close();

            return $resultado;
        }
        
        public function modificarJuego($id, $nombre, $descripcion, $plataforma, $caratula, $fecha, $precio){
            $conexion = conectar::conectarBD();
            $modificacion = $conexion->prepare("update juegos set nombre = ?, descripcion = ?, plataforma = ?, caratula = ?, fecha_lanzamiento = ?, precio = ? where id = ? ");
            $modificacion->bind_param('ssissdi', $nombre, $descripcion, $plataforma, $caratula, $fecha, $precio, $id);
            $modificacion->execute();
            $modificacion->close();
            $conexion->close();
        }


    }
?>