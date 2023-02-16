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
            $plataformas = $conexion->query("select nombre, logotipo, id, activo from plataformas");
            $i = 0;
            while($fila = $plataformas->fetch_array(MYSQLI_ASSOC)){
                $plataforma[$i]["logo"] = $fila["logotipo"];
                $plataforma[$i]["id"] = $fila["id"];
                $plataforma[$i]["nombre"] = $fila["nombre"];
                $plataforma[$i]["activo"] = $fila["activo"];
                $i++;
            }
            $conexion->close();
            return $plataforma;
        }

        public function getPlataformas(){
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->query("select nombre from plataformas");
            $i=0;
            $nombres = array();
            while($fila = $sentencia->fetch_array(MYSQLI_ASSOC)){
                $nombres[$i] = $fila["nombre"];
                $i++;
            }
            $conexion->close();
            return $nombres;
        }

        public function juegosPlataforma($id){
            $conexion = conectar::conectarBD();
            $lanzamientos = $conexion->query("select j.id id_juego, p.id id_plataforma, caratula, j.nombre juego, fecha_lanzamiento from juegos j, plataformas p where j.plataforma = p.id and p.id = '$id'");
            $i = 0;
            $juego = array();
            while($fila = $lanzamientos->fetch_array(MYSQLI_ASSOC)){
                $juego[$i]["foto"] = $fila["caratula"];
                $juego[$i]["nombre"] = $fila["juego"];
                $juego[$i]["fecha"] = $fila["fecha_lanzamiento"];
                $juego[$i]["id_juego"] = $fila["id_juego"];
                $juego[$i]["id_plataforma"] = $fila["id_plataforma"];
                $i++;
            }
            $conexion->close();
            return $juego;
        }

        public function desactivarPlataforma($id){
            $conexion = conectar::conectarBD();
            $desactivar = $conexion->prepare("update plataformas set activo = 0 where id = ?");
            $desactivar->bind_param('i', $id);
            $desactivar->execute();
            $desactivar->close();
            $conexion->close();
        }

        public function activarPlataforma($id){
            $conexion = conectar::conectarBD();
            $desactivar = $conexion->prepare("update plataformas set activo = 1 where id = ?");
            $desactivar->bind_param('i', $id);
            $desactivar->execute();
            $desactivar->close();
            $conexion->close();
        }
        

        public function buscarPlataforma($patron){
            $cadena_busqueda = str_pad($patron, strlen($patron)+2, '%', STR_PAD_BOTH);
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->prepare("select nombre, logotipo, id, activo from plataformas where nombre like ?");
            $sentencia->bind_param('s', $cadena_busqueda);
            $sentencia->bind_result($nombre, $logotipo, $id, $activo);
            $sentencia->execute();
            $resultados = array();
            $i=0;
            while($sentencia->fetch()){
                $resultados[$i]["nombre"] = $nombre;
                $resultados[$i]["logo"] = $logotipo;
                $resultados[$i]["id"] = $id;
                $resultados[$i]["activo"] = $activo;
                $i++;
            }
            $sentencia->close();
            $conexion->close();
            return $resultados;
        }

        public function getDatosPlataforma($id){
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->query("select id, nombre, logotipo from plataformas where id = '$id'");
            $i=0;
            while($fila = $sentencia->fetch_array(MYSQLI_ASSOC)){
                $datos[$i]["nombre"] = $fila["nombre"];
                $datos[$i]["logo"] = $fila["logotipo"];
                $datos[$i]["id"] = $fila["id"];
                $i++;
            }
            $conexion->close();
            return $datos;
        }

        public function modificarPlataforma($id, $nombre, $foto){
            $conexion = conectar::conectarBD();
            $modificar = $conexion->prepare("update plataformas set nombre = ?, logotipo = ? where id = ?");
            $modificar->bind_param('ssi', $nombre, $foto, $id);
            $modificar->execute();
            $modificar->close();
            $conexion->close();
        }

        public function insertarPlataforma($nombre, $logo){
            $conexion = conectar::conectarBD();
            $activo = 1;
            $insertar = $conexion->prepare("insert into plataformas values ('',?,?,?)");
            $insertar->bind_param('sis',$nombre, $activo, $logo);
            $insertar->execute();
            $insertar->close();
            $conexion->close();
        }

        public function getNombrePlataformas(){
            $conexion = conectar::conectarBD();
            $consulta = $conexion->query("select nombre, id from plataformas");
            $i=0;
            $resultados = array();
            while($fila = $consulta->fetch_array(MYSQLI_ASSOC)){
                $resultados[$i]["nombre"] = $fila["nombre"];
                $resultados[$i]["id"] = $fila["id"];
                $i++;
            }
            $conexion->close();
            return $resultados;
        }
    }
?>