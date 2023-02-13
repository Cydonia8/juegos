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

        public function __get($atr){
            return $this->$atr;
        }

        public function __set($atr, $valor){
            $this->$atr=$valor;
        }

        public function ultimosComentarios(){
            $ultimos = $this->bd->query("select caratula, u.nombre user, texto, fecha from comentario c, juegos j, usuarios u where c.usuario = u.id and j.id = c.juego order by fecha desc limit 5");
            $i = 0;
            while($fila=$ultimos->fetch_array(MYSQLI_ASSOC)){
                $comentarios[$i]['foto'] = $fila['caratula'];
                $comentarios[$i]['usuario'] = $fila['user'];
                $comentarios[$i]['comentario'] = $fila['texto'];
                $comentarios[$i]['fecha'] = $fila['fecha'];
                $i++;
            }
            return $comentarios;
        }

        public function comentariosJuego($id, $plat){
            $comentarios = $this->bd->prepare("select texto, fecha, u.nombre usuario, j.nombre juego from comentario c, juegos j, usuarios u where c.juego = j.id and c.usuario = u.id and c.juego = ? and j.plataforma = ?");
            $comentarios->bind_param('ii', $id, $plat);
            $comentarios->bind_result($texto, $fecha, $usuario, $juego);
            $comentarios->execute();
            $i=0;
            $coments = array();
            while($comentarios->fetch()){
                $coments[$i]["texto"] = $texto;
                $coments[$i]["fecha"] = $fecha;
                $coments[$i]["usuario"] = $usuario;
                $coments[$i]["juego"] = $juego;
                $i++;
            }
            $comentarios->close();
            return $coments;
        }

        public function insertarComentario($usuario, $juego, $texto, $fecha){
            $insertar = $this->bd->prepare("insert into comentario values (?, ?, ?, ?)");
            $insertar->bind_param('iiss', $usuario, $juego, $texto, $fecha);
            $insertar->execute();
            $insertar->close();
        }

        public function getComentarios(){
            $comentarios = $this->bd->query("select texto, j.nombre juego, u.nick usuario, fecha from comentario c, juegos j, usuarios u where c.juego = j.id and c.usuario = u.id");
            $i = 0;
            while($fila = $comentarios->fetch_array(MYSQLI_ASSOC)){
                $comentario[$i]["texto"] = $fila["texto"];
                $comentario[$i]["juego"] = $fila["juego"];
                $comentario[$i]["usuario"] = $fila["usuario"];
                $comentario[$i]["fecha"] = $fila["fecha"];
                $i++;
            }
            return $comentario;
        }

        public function getDatosBorrar($texto, $juego, $usuario){
            $datos = $this->bd->prepare("select usuario, juego from comentario c, juegos j, usuarios u where c.usuario = u.id and c.juego = j.id and texto = ? and u.nick = ? and j.nombre = ?");
            $datos->bind_param('sss', $texto, $usuario, $juego);
            $datos->bind_result($usuario_id, $juego_id);
            $datos->execute();
            $datos->fetch();
            $codigos[0]["usuario"] = $usuario_id;
            $codigos[0]["juego"] = $juego_id;
            $datos->close();
            return $codigos;
        }

        public function eliminarComentario($texto, $juego, $usuario){
            $sentencia = $this->bd->prepare("delete from comentario where texto = ? and juego = ? and usuario = ?");
            $sentencia->bind_param('sii', $texto, $juego, $usuario);
            $sentencia->execute();
            $sentencia->close();
        }
    }
?>