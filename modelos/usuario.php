<?php
    class usuario{
        private $id;
        private $nombre;
        private $nick; 
        private $pass;
        private $activo;

        public function __construct(){
            $this->id=0;
            $this->nombre='';
            $this->nick='';
            $this->pass='';
            $this->activo=0;
        }

        public function getUsuarios(){
            $conexion = conectar::conectarBD();
            $usuarios = $conexion->query("select id, nombre, nick, activo from usuarios where id > 0");
            $i=0;
            while($fila = $usuarios->fetch_array(MYSQLI_ASSOC)){
                $datos_usu[$i]["id"] = $fila["id"];
                $datos_usu[$i]["nombre"] = $fila["nombre"];
                $datos_usu[$i]["nick"] = $fila["nick"];
                $datos_usu[$i]["activo"] = $fila["activo"];
                $i++;
            }
            $conexion->close();
            return $datos_usu;
        }

        public function desactivarUsuario($id){
            $conexion = conectar::conectarBD();
            $desactivacion = $conexion->prepare("update usuarios set activo = 0 where id = ?");
            $desactivacion->bind_param('i', $id);
            $desactivacion->execute();
            $desactivacion->close();
            $conexion->close();
        }

        public function activarUsuario($id){
            $conexion = conectar::conectarBD();
            $desactivacion = $conexion->prepare("update usuarios set activo = 1 where id = ?");
            $desactivacion->bind_param('i', $id);
            $desactivacion->execute();
            $desactivacion->close();
            $conexion->close();
        }

        public function sacarIDUsuario($nick){
            $conexion = conectar::conectarBD();
            $consulta = $conexion->prepare("select id from usuarios where nick = ?");
            $consulta->bind_param('s', $nick);
            $consulta->bind_result($id);
            $consulta->execute();
            $consulta->fetch();
            $consulta->close();
            $conexion->close();

            return $id;
        }

        public function buscarUsuario($patron){
            $cadena_busqueda = str_pad($patron, strlen($patron)+2, '%', STR_PAD_BOTH);
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->prepare("select id, nombre, nick, activo from usuarios where id > 0 and nombre like ?");
            $sentencia->bind_param('s', $cadena_busqueda);
            $sentencia->bind_result($id, $nombre, $nick, $activo);
            $sentencia->execute();
            $i=0;
            $resultados = array();
            while($sentencia->fetch()){
                $resultados[$i]["id"] = $id;
                $resultados[$i]["nombre"] = $nombre;
                $resultados[$i]["nick"] = $nick;
                $resultados[$i]["activo"] = $activo;
                $i++;
            }
            $sentencia->close();
            $conexion->close();
            return $resultados;
        }

        public function usuarioRepetido($nick){
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->prepare("select count(*) from usuarios where nick = ?");
            $sentencia->bind_param('s', $nick);
            $sentencia->bind_result($comprobante);
            $sentencia->execute();
            $sentencia->fetch();
            $sentencia->close();
            $conexion->close();

            return $comprobante;
        }

        public function insertarUsuario($nombre, $nick, $pass){
            $conexion = conectar::conectarBD();
            $activo = 1;
            $insercion = $conexion->prepare("insert into usuarios values ('',?, ?, ?, ?)");
            $insercion->bind_param('sssi', $nombre, $nick, $pass, $activo   );
            $insercion->execute();
            $insercion->close();
            $conexion->close();
        }

        public function getDatosUsuario($id){
            $conexion = conectar::conectarBD();
            $sentencia = $conexion->query("select id, nombre, nick, pass from usuarios where id = '$id'");
            $i=0;
            while($fila=$sentencia->fetch_array(MYSQLI_ASSOC)){
                $resultado[$i]["id"] = $fila["id"];
                $resultado[$i]["nombre"] = $fila["nombre"];
                $resultado[$i]["nick"] = $fila["nick"];
                $resultado[$i]["pass"] = $fila["pass"];
                $i++;
            }
            $conexion->close();
            return $resultado;
        }

        public function modificarUsuario($id, $nombre, $nick, $pass){
            $conexion = conectar::conectarBD();
            $modificar = $conexion->prepare("update usuarios set nombre = ?, nick = ?, pass = ? where id = ?");
            $modificar->bind_param('sssi', $nombre, $nick, $pass, $id);
            $modificar->execute();
            $modificar->close();
            $conexion->close();
        }
    }
?>