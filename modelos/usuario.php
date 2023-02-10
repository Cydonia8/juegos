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
    }
?>